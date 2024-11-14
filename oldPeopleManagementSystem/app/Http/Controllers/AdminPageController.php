<?php

namespace App\Http\Controllers;

use App\Models\AdminPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminPageController extends Controller
{
    // Grabs all the data from the admin_pages table and sends it to the page
    public function role()
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail','You must be an admin');
        }
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }

    // Adds a new role to the admin_pages table and sends that data to the page
    public function makeRole(Request $request)
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail','You must be an admin');
        }

        $request->validate([
            'role' => 'required',
            'access_num' => 'required',
        ]);

        $roles = new AdminPage();
        $roles->role = $request->role;
        $roles->access_lvl = $request->access_num;
        $roles->save();
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }
}