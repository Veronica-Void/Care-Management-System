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

        $id = Session::get('loginId');
        $patients = DB::table('patient_infos')->where('caregiver_id', $id)->get()->pluck("patient_name");

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
        $patients = DB::table('patient_infos')->where('caregiver_id', $id)->get()->pluck("patient_name");

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
        $patients = DB::table('patient_infos')->where('caregiver_id', $id)->get()->pluck("patient_name");

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $message = "This is now searchPatient";

        return view("careGiverHome", compact("patients", "message"));

    }
    public function patientHome(){
        $details = PatientInfo::all();

        // Return the view with the roster data
        return view('patientHome', compact('details'));

    }
}