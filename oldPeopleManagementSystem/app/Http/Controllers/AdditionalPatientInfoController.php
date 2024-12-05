<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\additionalPatientInfo;
use App\Models\LoginPage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AdditionalPatientInfoController extends Controller
{
    //display addittional patient info page
    public function patientInfo ()
    {
        //get the patient names from the database.
        $patients = DB::table('users')->where('role', 'patient')->get(); 

        //passing the names to the view
        return view('additional-patient-info', compact('patients'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //getting all the users from the database
    //     $patients = DB::table('users')->where('role', 'patient')->get(); 
    //     return view('additionalPatientInfo', compact('patients'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validating the inputs from the form on the blade. 
        if($request->roles === 'admin') {
            $request->validate([
                'patient_id' => 'required|integer|max:5|exists:users,id', //making sure the max ID len is 5 and ensuring patient_ID is in the users table.
                'group' => 'required|string',
                'admission_date' => 'required|date',
                'patient_name' => 'required|string',
            ]);
        }
        
        //new instance to add the patient info to the database.
        $patientInfo = new AdditionalPatientInfo();
        $patientInfo->patient_id = $request->input('patient_id');
        $patientInfo->group = $request->input('group');
        $patientInfo->admission_date = $request->input('admission_date');
        $patientInfo->patient_name = $request->input('patient_name');        
        $patientInfo->save();

        return redirect()->route('admin')->with('success', 'Patient info saved successfully.');



                //getting the patient's first name
        // $users = DB::table('users')->where('role', 'patient')->get(); 
        // $user = $users->find($request->input('patient_id'));
        // if ($user){
        //     $patientInfo->patient_name = $user->f_name;
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show (AdditionalPatientInfo $additionalPatientInfo)
    {
        //grabbing all the users from the databse
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalPatientInfo $additionalPatientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdditionalPatientInfo $additionalPatientInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalPatientInfo $additionalPatientInfo)
    {
        //
    }
}
