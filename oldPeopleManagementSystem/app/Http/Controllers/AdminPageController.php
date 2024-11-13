<?php

namespace App\Http\Controllers;

use App\Models\AdminPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AdminPageController extends Controller
{
    //Use $adminPage
    public function role()
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail','You must be an admin');
        }
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }

    public function makeRole(Request $request)
    {
        if (Session::get('role') !== 'admin') {
            return back()->with('fail','You must be an admin');
        }
        $roles = new AdminPage();
        $roles->role = $request->role;
        $roles->access_lvl = $request->access_num;
        $roles->save();
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }
}
