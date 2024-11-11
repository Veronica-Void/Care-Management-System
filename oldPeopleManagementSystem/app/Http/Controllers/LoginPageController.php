<?php

// app/Http/Controllers/PageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Only this Session import is needed

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
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|max:12|min:5',
            'dob' => 'required'
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
        $res = $user->save();

        // Check if the user was successfully saved and return appropriate response
        if ($res) {
            return back()->with('success', 'You have been registered');
        } else {
            return back()->with('fail', 'Something went wrong');
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
            'password' => 'required|max:12|min:5',
        ]);
    
        // Retrieve user based on email
        $user = LoginPage::where('email', '=', $request->email)->first();
        
        // Check if the user exists and the password is correct
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // Store user ID in session if login is successful
                Session::put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'This password is incorrect');
            }
        } else {
            return back()->with('fail', 'This email is unregistered');
        }
    }

    // Display the dashboard page (after successful login)
// Display the dashboard page (after successful login)
public function dashboard()
{
    $data = array();
    if(Session::has('loginId')){
        $data = LoginPage::where('id', '=', Session::get('loginId'))->first();
    }
    return view('dashboard', compact('data'));
}

public function logout(){
    if(Session::has('loginId')){
        Session::pull('loginId');
        return redirect('login');
    }
}

    // Show the admin page
    public function admin()
    {
        
        return view('admin');
    }
}

    