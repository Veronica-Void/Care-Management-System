<?php

namespace App\Http\Controllers;

use App\Models\doctorHome;
use App\Models\patientInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DoctorHomeController extends Controller
{
    
    public function home()
    {
        // $newInfo = new patientInfo();
        // $newInfo->patient_name = "pat1";
        // $newInfo->patient_id = 5;
        // $newInfo->docs_id = 2;
        // $newInfo->docs_appt = "0001-01-01";
        // $newInfo->caregiver_id = 4;
        // $newInfo->morning_meds = 0;
        // $newInfo->afternoon_meds = 0;
        // $newInfo->night_meds = 0;
        // $newInfo->breakfast = 0;
        // $newInfo->lunch = 0;
        // $newInfo->dinner = 0;
        // $newInfo->save();

        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $morn = "N/A";
        $after = "N/A";
        $night = "N/A";
        $break = "N/A";
        $lunch = "N/A";
        $din = "N/A";

        $data = [$morn, $after, $night, $break, $lunch, $din];

        return view("doctorHome", compact("patients", "data"));
    }

    public function search()
    {
        alert("This should cause an immediate error upon searching");
        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('docs_id', $id)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $tableData = DB::table('patient_infos')->where('docs_id', $id)->get();

        $data = [$tableData->morning_meds, $tableData->afternoon_meds, $tableData->night_meds, $tableData->breakfast, $tableData->lunch, $tableData->dinner];

        return view("doctorHome", compact("patients"));
    }
}
