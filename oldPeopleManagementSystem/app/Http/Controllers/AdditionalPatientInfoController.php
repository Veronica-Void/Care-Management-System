<?php

namespace App\Http\Controllers;

use App\Models\additionalPatientInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// if ((Session::get('role') == 'admin') or (Session::get('role') == 'supervisor')) {
//     return view("auth.additional-patient-info");
// }

class AdditionalPatientInfoController extends Controller
{
    //display addittional patient info page
    public function patientInfo ()
    {
        return view("additional-patient-info");
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(additionalPatientInfo $additionalPatientInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(additionalPatientInfo $additionalPatientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, additionalPatientInfo $additionalPatientInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(additionalPatientInfo $additionalPatientInfo)
    {
        //
    }
}
