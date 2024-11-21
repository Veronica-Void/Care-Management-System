<?php

namespace App\Http\Controllers;

use App\Models\patientInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PatientInfoController extends Controller
{
    // Display the home page
    public function caregiver()
    {
        // $newInfo = new patientInfo();
        // $newInfo->patient_name = "pat1";
        // $newInfo->patient_id = 5;
        // $newInfo->docs_name = "Doc2";
        // $newInfo->docs_appt = "0001-01-01";
        // $newInfo->caregiver_first = "FirstCare1";
        // $newInfo->caregiver_last = "LastCare1";
        // $newInfo->morning_meds = 0;
        // $newInfo->afternoon_meds = 0;
        // $newInfo->night_meds = 0;
        // $newInfo->breakfast = 0;
        // $newInfo->lunch = 0;
        // $newInfo->dinner = 0;
        // $newInfo->save();

        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view("careGiverHome", compact("patients"));
    }

    public function getPatient(Request $request)
    {
        alert("qqq");
        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view("careGiverHome", compact("patients"));
    }

    // Edits the database and inputs ONLY the checked data
    public function checkData(Request $request)
    {
        alert("qqq");
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
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view ("careGiverHome", compact("patients"));
    }
}
