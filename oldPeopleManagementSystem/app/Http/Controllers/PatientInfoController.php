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
        $caregiver = DB::table('users')->where('id', $id)->first();
        $roster = DB::table('rosters')->where('caregiver_name', $caregiver->f_name)->first();
        $care_first = $caregiver->f_name;
        $care_last = $caregiver->l_name;

        //grabbing the patients based on the caregiver's assigned group
        $patients = DB::table('additional_patient_infos')->where('group', $roster->group)->get();

        if ($patients->isEmpty()) {
            $patients = "N/A";
        }

        return view("caregiverHome", compact("patients", "care_first", "care_last"));
    }


    public function selectPatient(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string',

        ]);
        //keeping the selected patient's name in the session and displaying it
        $selectedPatientName = $request->input('patient_name');
        $patient = DB::table('additional_patient_infos')->where('patient_name', 'like', $selectedPatientName)->first();
        Session()->put('selected_patient', $selectedPatientName);

        return redirect()->back()->with('success', 'Patient selected successfully');
    }

    // not using this function, using storePatientInfo - Vee
    // Edits the database and inputs ONLY the checked data
    // public function checkData(Request $request)
    // {
    //     alert("HELP");
    //     if ($request->morning_med != 1){$request->morning_med = 0;}
    //     if ($request->afternoon_med != 1){$request->afternoon_med = 0;}
    //     if ($request->night_med != 1){$request->night_med = 0;}
    //     if ($request->breakfast != 1){$request->breakfast = 0;}
    //     if ($request->lunch != 1){$request->lunch = 0;}
    //     if ($request->dinner != 1){$request->dinner = 0;}

    //     $newData = DB::table('patient_infos')->where('patient_name', $request->patient)->get();
    //     $newData->morning_meds = $request->morning_med;
    //     $newData->afternoon_meds = $request->afternoon_med;
    //     $newData->night_meds = $request->night_med;
    //     $newData->breakfast = $request->breakfast;
    //     $newData->lunch = $request->lunch;
    //     $newData->dinner = $request->dinner;
    //     $newData->save();
    // }

    public function editMeds(Request $request)
    {
        // Validate request to ensure at least one checkbox input is provided
        $request->validate([
            'patient' => 'required|string', // Ensure a patient is selected
            'morning_med' => 'nullable|boolean',
            'afternoon_med' => 'nullable|boolean',
            'night_med' => 'nullable|boolean',
            'breakfast' => 'nullable|boolean',
            'lunch' => 'nullable|boolean',
            'dinner' => 'nullable|boolean',
        ]);

        $caregiverId = Session::get('loginId');
        $patientName = $request->input('patient');

        // Find the patient's record in the database
        $patient = DB::table('patient_infos')
            ->where('caregiver_id', $caregiverId)
            ->where('patient_name', $patientName)
            ->first();

        if (!$patient) {
            return back()->with('error', 'Patient not found or not assigned to the caregiver.');
        }

        // Update the medication and meal statuses
        DB::table('patient_infos')
            ->where('id', $patient->id) // Match the patient's record
            ->update([
                'morning_meds' => $request->has('morning_med') ? 1 : 0,
                'afternoon_meds' => $request->has('afternoon_med') ? 1 : 0,
                'night_meds' => $request->has('night_med') ? 1 : 0,
                'breakfast' => $request->has('breakfast') ? 1 : 0,
                'lunch' => $request->has('lunch') ? 1 : 0,
                'dinner' => $request->has('dinner') ? 1 : 0,
            ]);

        // Fetch updated patients list
        $patients = DB::table('patient_infos')->where('caregiver_id', $caregiverId)->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        $message = "Patient records have been successfully updated.";

        // Return the caregiver home view with updated data and success message
        return view("careGiverHome", compact("patients", "message"));
    }

        return view("careGiverHome", compact("patients", "message"));
    }

    public function searchPatient(Request $request)
    {
        $request->validate([
            'roles' => 'required',
        ]);
        
        $id = Session::get('loginId');
        $care_first = DB::table('users')->where('id', $id)->get()->pluck("f_name");
        $care_last = DB::table('users')->where('id', $id)->get()->pluck("l_name");
        $patients = DB::table('patient_infos')->where('caregiver_first', $care_first)->where('caregiver_last', $care_last)->get()->pluck('patient_name');

        if (count($patients) == 0) {
            $patients = "N/A";
        }

        return view ("caregiverHome", compact("patients"));
    }


    public function patientHome(Request $request){
        $id = Session::get('loginId');
        $current_patient = patientInfo::where('patient_id', $id)->get();
        $details = patientInfo::all();
        // Return the view with the roster data
        return view('patientHome', compact('details', 'current_patient'));
    }

    public function storePatientInfo (Request $request){
        if($request->roles === 'caregiver'){
            // request validation
            $request->validate([
                'morning_meds' => 'nullable|integer',
                'afternoon_meds' => 'nullable|integer',
                'night_meds' => 'nullable|integer',
                'breakfast' => 'nullable|integer',
                'lunch' => 'nullable|integer',
                'dinner' => 'nullable|integer',
            ]);
        }

        //new instance to add the checked boxes to the database. 
        $patientInfo = new patientInfo();

        // patient info
        $patientInfo->patient_name = $request->input('patient_name');
        $patientInfo->patient_id = $request->input('patient_id');

        // doc info
        $patientInfo->docs_name = $request->input('docs_name');
        $patientInfo->docs_appt = $request->input('docs_appt');

        // caregiver info
        $patientInfo->caregiver_first = $request->input('caregiver_first');
        $patientInfo->caregiver_last = $request->input('caregiver_last');

        // medications
        $patientInfo->morning_meds = $request->has('morning_meds') ? 1 : 0;
        $patientInfo->afternoon_meds = $request->has('afternoon_meds') ? 1 : 0;
        $patientInfo->night_meds = $request->has('night_meds') ? 1 : 0;

        // meals
        $patientInfo->breakfast = $request->has('breakfast') ? 1 : 0;
        $patientInfo->lunch = $request->has('lunch') ? 1 : 0;
        $patientInfo->dinner = $request->has('dinner') ? 1 : 0;

        //save the data to the DB
        $patientInfo->save();

        //have to figure out how to add a value or price to the doc appt, meals, etc so I can calculate it and use in payment functionality.
        //make sure the correct doctor is selected by default, for example: If patient is group A and Doc has Group A then they are assigned to that doctor.
        return redirect()->route('caregiver')->with('success', 'Patient information has been added Successfully.');
        
    }
}


?>
