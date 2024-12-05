<?php

namespace App\Http\Controllers;

use App\Models\doctorHome;
use App\Models\patientInfo;
use App\Models\doctor_comments;
use App\Models\additionalPatientInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DoctorHomeController extends Controller
{
    
    public function home()
    {
        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");
        $patient_id = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_id");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $comment = DB::table('doctor_comments')->where('docs_id', $id)->get()->pluck("comment");
        $morn = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("morning_meds");
        $after = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("afternoon_meds");
        $night = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("night_meds");

        $data = [$morn, $after, $night];

        $patient_name = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");
        $date = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("docs_appt");

        return view("doctorHome", compact("patients", "patient_id", "patient_name", "date", "data", "comment"));
    }

    public function searchPatient(Request $request)
    {
        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('docs_id', $id)->where('patient_id', $request->patient_id)->get()->value("patient_name");
        $patient_id = $request->patient_id;

        $comments = DB::table('doctor_comments')->where('docs_id', $id)->where('patient_id', $patient_id)->get()->pluck("comment");

        $data = DB::table('patient_infos')->where('docs_id', $id)->where('patient_id', $patient_id)->get();

        $patient_name = DB::table('patient_infos')->where('docs_id', $id)->where('patient_id', $request->patient_id)->get()->value("patient_name");
        $date = DB::table('patient_infos')->where('docs_id', $id)->where('patient_id', $patient_id)->get()->value("docs_appt");

        return view("doctorPerscription", compact("patients", "patient_id", "patient_name", "date", "comments", "data"));
    }

    public function newPerscription(Request $request)
    {
        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");
        $patient_id = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_id");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $comment = DB::table('doctor_comments')->where('docs_id', $id)->get()->pluck("comment");
        $morn = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("morning_meds");
        $after = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("afternoon_meds");
        $night = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("night_meds");

        $data = [$morn, $after, $night];

        $patient_name = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");
        $date = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("docs_appt");

        $searchID = DB::table('patient_infos')->where('docs_id', $id)->where('patient_name', $request->patient_name)->get()->value("patient_id");
        $patient_group = DB::table('additional_patient_infos')->where('patient_ID', $searchID)->get()->value("group");
        $care_name = DB::table('rosters')->where('group', $patient_group)->get()->value("caregiver_name");
        $caregiver_id = DB::table('users')->where('f_name', $care_name)->where('role', 'caregiver')->get()->value("id");

        $newData = new patientInfo();
        $newData->patient_name = $request->patient_name;
        $newData->patient_id = $searchID;
        $newData->docs_id = $id;
        $newData->docs_appt = date("20y-m-d");
        $newData->caregiver_id = $caregiver_id;

        if (strtolower($request->morning) == "yes") {$newData->morning_meds = 1;}
        elseif (strtolower($request->morning) == "no") {$newData->morning_meds = 0;}
        else {$newData->morning_meds = 2;}

        if (strtolower($request->afternoon) == "yes") {$newData->afternoon_meds = 1;}
        elseif (strtolower($request->afternoon) == "no") {$newData->afternoon_meds = 0;}
        else {$newData->afternoon_meds = 2;}

        if (strtolower($request->night) == "yes") {$newData->night_meds = 1;}
        elseif (strtolower($request->night) == "no") {$newData->night_meds = 0;}
        else {$newData->night_meds = 2;}

        $newData->breakfast = 0;
        $newData->lunch = 0;
        $newData->dinner = 0;
        $newData->save();

        // GET ALL PREVIOUS PATIENT APPOINTMENTS TOO!!

        return view("doctorHome", compact("patients", "patient_id", "patient_name", "date", "data", "comment"));
    }
}
