<?php

namespace App\Http\Controllers;

use App\Models\AdminPage;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    //Use $adminPage
    public function role()
    {
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }

    public function makeRole(Request $request)
    {
        $roles = new AdminPage();
        $roles->role = $request->role;
        $roles->access_lvl = $request->access_num;
        $roles->save();
        $roles = AdminPage::all();
        return view("auth.role", compact("roles"));
    }
}
