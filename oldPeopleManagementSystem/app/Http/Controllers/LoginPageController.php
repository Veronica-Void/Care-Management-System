<?php

// app/Http/Controllers/PageController.php
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

        // Create a new User instance and save the details
        $user = new LoginPage();
        $user->role = $request->roles;
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password); // Hash the password before saving
        $user->dob = $request->dob;

        // Save the user and return response
        if ($user->save()) {
            return redirect()->back()->with('success', 'You have been registered successfully');
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

        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('loginId', $user->id);
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
        }

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    // Show the admin page
    public function admin()
    {
        return view('admin');
    }

}