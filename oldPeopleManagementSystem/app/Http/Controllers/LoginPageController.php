<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginPageController extends Controller
{
    // Display the home page
    public function home()
    {
        return view("home");
    }

    // Show the registration page
    public function register()
    {
        return view("auth.register");
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
            return back()->with('fail','You must be an admin');
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

}
