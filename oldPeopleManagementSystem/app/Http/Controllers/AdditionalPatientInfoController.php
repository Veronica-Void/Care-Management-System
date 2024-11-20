<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionalPatientInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class AdditionalPatientInfoController extends Controller
{
    //display addittional patient info page
    public function patientInfo ()
    {
        return view("additional-patient-info");
    }

    // public function showPatient ()
    // {
    //     $patients = User::where('role', 'patient')->get();
    //     return view('additional-patient-info', compact('patients'));
        
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->roles === 'admin') {
            $request->validate([
                'patient_id' => 'required|integer|max:5',
                'group' => 'required|string',
                'admission_date' => 'required|date',
            ]);

        }
        

        $patientInfo = new AdditionalPatientInfo();
        $patientInfo->patient_id = $request->input('patient_id');
        $patientInfo->group = $request->input('group');
        $patientInfo->admission_date = $request->input('admission_date');
        $patientInfo->save();

        return redirect()->route('admin')->with('success', 'Patient info saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show (AdditionalPatientInfo $additionalPatientInfo)
    {

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
