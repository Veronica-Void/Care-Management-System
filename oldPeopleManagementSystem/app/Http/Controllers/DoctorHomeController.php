<?php

namespace App\Http\Controllers;

use App\Models\doctorHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DoctorHomeController extends Controller
{
    
    public function home()
    {
        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('caregiver_id', $id)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }
      
        $message = DB::table('patient_infos')->where('caregiver_first', $care_first)->get()->pluck("patient_name");

        return view("doctorHome", compact("patients", "message"));
    }
}
