<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use App\Models\Roster;
use Illuminate\Support\Facades\DB;
class LoginPageController extends Controller
{

    // Show the registration page
    public function register(Request $request)
    {
        // Retrieve old input data (if any) and determine if the patient fields should be shown
        $showPatientFields = $request->old('roles') === 'patient'; // Check if 'patient' was selected previously
        
        // Pass the data to the view
        return view("auth.register", [
            'showPatientFields' => $showPatientFields,
            'formData' => $request->old()
        ]);
    }

    // Handle user registration
    public function registerUser(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'roles' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|min:5|max:12',
            'dob' => 'required|date'
        ]);

        // If the role is 'patient', validate the additional fields
        if ($request->roles === 'patient') {
            $request->validate([
                'family_code' => 'required',
                'emergency_contact' => 'required',
                'relation_to_emergency_contact' => 'required',
            ]);
        }

        // Create a new User instance and save the details as unapproved initially
        $user = new LoginPage();
        $user->role = $request->roles;
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password); // Hash the password before saving
        $user->dob = $request->dob;
        $user->is_approved = false; // New field to indicate approval status

        // If the user is a patient, save additional patient information
        if ($request->roles === 'patient') {
            $user->family_code = $request->family_code;
            $user->emergency_contact = $request->emergency_contact;
            $user->relation_to_emergency_contact = $request->relation_to_emergency_contact;
        }

        // Save the user and return response
        if ($user->save()) {
            return redirect()->back()->with('success', 'You have been registered successfully. Waiting for admin approval.');
        } else {
            return redirect()->back()->with('fail', 'Registration failed, please try again');
        }
    }

    // Show the login page
    public function login()
    {
        return view("auth.login");
    }

    // Handle user login
    public function loginUser(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5|max:12',
        ]);

        // Retrieve user based on email
        $user = LoginPage::where('email', $request->email)->first();

        // Check if the user exists, the password is correct, and the user is approved
        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->is_approved) {
                return redirect()->back()->with('fail', 'Account not approved by admin.');
            }

            Session::put('loginId', $user->id);
            Session::put('role', $user->role);
            if ($user->role == 'admin') {
                return redirect()->route('admin');
            }elseif ($user->role == 'caregiver'){
                return redirect()->route('caregiver');
            }elseif ($user->role == 'patient'){
                return redirect()->route('patientHome');
            }
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('fail', 'Invalid credentials');
    }

    // Display the dashboard page (after successful login)
    public function dashboard()
    {
        if (Session::has('loginId')) {
            $data = LoginPage::find(Session::get('loginId'));
            return view('dashboard', compact('data'));
        }

        return redirect()->route('login')->with('fail', 'Please log in first');
    }

    // Logout function
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::forget('loginId');
            Session::forget('role');
        }

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    // Show the admin page
    public function admin()
    {
        $data = LoginPage::find(Session::get('loginId'));
        return view('admin', compact('data'));
    }

    // Only allow 'admin' to access the approval page and approve new users
    public function approval()
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail', 'You must be an admin');
        }
        // Fetch users awaiting approval
        $unapprovedUsers = LoginPage::where('is_approved', false)->get();


        return view('approval', compact('unapprovedUsers'));
    }

    // Method to approve a user
    public function approveUser($id)
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail', 'Unauthorized access');
        }

        $user = LoginPage::find($id);

        if ($user) {
            $user->is_approved = true; // Set user as approved
            $user->save();
            return redirect()->route('approval')->with('success', 'User approved successfully');
        } else {
            return back()->with('fail', 'User not found');
        }
    }

    // Method to deny a user
    public function denyUser($id)
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail', 'Unauthorized access');
        }

        $user = LoginPage::find($id);

        if ($user) {
            $user->delete(); // Remove the unapproved user from the database
            return redirect()->route('approval')->with('success', 'User denied successfully');
        } else {
            return back()->with('fail', 'User not found');
        }
    }

    // Method to handle showing patient-specific fields dynamically
    public function addToPage(Request $request)
    {
        // Initialize form data to avoid undefined variable errors
        $formData = $request->all() ?: [];

        // Initialize showPatientFields as false unless 'patient' is selected
        $showPatientFields = isset($formData['roles']) && $formData['roles'] === 'patient';

        // Pass variables to the view
        return view('auth.register', [
            'showPatientFields' => $showPatientFields,
            'formData' => $formData,
        ]);
    }
    public function employees()
    {
        // Retrieve the approved users
        $approvedUsers = LoginPage::where('is_approved', true)->get();
    
        // Retrieve the current user's role from the session
        $userRole = Session::get('role');
    
        // Pass approved users and user role to the view
        return view('employees', compact('approvedUsers', 'userRole'));
    }

    // Searches the database for the inqured term
    public function searchForTerm(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required',
            'searched' => 'required',
        ]);

        // Retrieve the approved users
        $approvedUsers = LoginPage::where('is_approved', true)->where($request->searchTerm, $request->searched)->get();
    
        // Retrieve the current user's role from the session
        $userRole = Session::get('role');
    
        // Pass approved users and user role to the view
        return view('employees', compact('approvedUsers', 'userRole'));
    }

    public function patients()
    {
        $approvedUsers = LoginPage::where('is_approved', true)->get();
        return view('patients', compact('approvedUsers'));
    }
    public function updateSalary(Request $request)
{
    // Validate the form inputs
    $request->validate([
        'id' => 'required|exists:users,id',
        'salary' => 'required|numeric|min:0',
    ]);

    // Find the user by ID and update their salary
    $user = LoginPage::find($request->id);
    $user->salary = $request->salary;
    
    if ($user->save()) {
        return redirect()->back()->with('success', 'Salary updated successfully');
    } else {
        return redirect()->back()->with('fail', 'Salary update failed');
    }
}
    public function createRoster(Request $request)
    {
        // Validate the request data
        $request->validate([
            'supervisor_name' => 'required|string',
            'doctor_name' => 'required|string',
            'caregiver_name' => 'required|string',
            'group'=> 'required|string',
            'date' => 'required|date',
        ]);
    
        // Create the roster
        Roster::create([
            'supervisor_name' => $request->input('supervisor_name'),
            'doctor_name' => $request->input('doctor_name'),
            'caregiver_name' => $request->input('caregiver_name'),
            'group'=> $request->input('group'),
            'date' => $request->input('date'),
        ]);
    
        return back()->with('success', 'Roster created successfully!');
    }

    public function newRoster()
    {
        // Fetch doctors, caregivers, and supervisors
        $doctors = DB::table('users')->where('role', 'doctor')->get(['id', 'f_name']);
        $caregivers = DB::table('users')->where('role', 'caregiver')->get(['id', 'f_name']);
        $supervisors = DB::table('users')->where('role', 'supervisor')->get(['id', 'f_name']);

        // Pass data to the view
        return view('newRoster', compact('doctors', 'caregivers', 'supervisors'));
    }



    // Method to display all rosters
    public function viewRoster()
    {
        // Fetch all rosters
        $rosters = Roster::all();

        // Return the view with the roster data
        return view('viewRoster', compact('rosters'));
    }
}