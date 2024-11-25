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
        $care_first = DB::table('users')->where('id', $id)->get()->value("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->value("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $message = "This is now careGiver";

        return view("careGiverHome", compact("patients", "message"));
    }

    public function editMeds(Request $request)
    {

        $request->validate([
            'roles' => 'required',
        ]);

        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->value("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->value("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $message = "This is now editMeds";

        return view("careGiverHome", compact("patients", "message"));
    }

    public function searchPatient(Request $request)
    {
        $request->validate([
            'roles' => 'required',
        ]);
        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->value("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->value("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $message = "This is now searchPatient";

        return view("careGiverHome", compact("patients", "message"));
    }
}