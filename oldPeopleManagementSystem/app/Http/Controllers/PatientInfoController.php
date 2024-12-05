<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientInfo;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PatientInfoController extends Controller
{
    // Display the home page
    public function caregiver()
    {
        //using session to check whether the person logged in is a caregiver
        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('users')->where('role', 'patient')->get();

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view("caregiverHome", compact("patients"));
    }

    public function selectPatient(Request $request)
    {
        alert("WHAT");
        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view("caregiverHome", compact("patients"));
    }

    // Edits the database and inputs ONLY the checked data
    public function checkData(Request $request)
    {
        alert("HELP");
        if ($request->morning_med != 1){$request->morning_med = 0;}
        if ($request->afternoon_med != 1){$request->afternoon_med = 0;}
        if ($request->night_med != 1){$request->night_med = 0;}
        if ($request->breakfast != 1){$request->breakfast = 0;}
        if ($request->lunch != 1){$request->lunch = 0;}
        if ($request->dinner != 1){$request->dinner = 0;}

        $newData = DB::table('patient_infos')->where('patient_name', $request->patient)->get();
        $newData->morning_meds = $request->morning_med;
        $newData->afternoon_meds = $request->afternoon_med;
        $newData->night_meds = $request->night_med;
        $newData->breakfast = $request->breakfast;
        $newData->lunch = $request->lunch;
        $newData->dinner = $request->dinner;
        $newData->save();

        $id = Session::get('loginId');
        $current_patient = patientInfo::where('patient_id', $id)->get();
        $details = patientInfo::all();
        // Return the view with the roster data
        return view('patientHome', compact('details', 'current_patient'));
    }
}


?>
