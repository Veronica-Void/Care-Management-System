<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\additionalPatientInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewPaymentPage(Request $request)
    {
        return view("payment");
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
        //validate incoming data
        if($request->roles === 'admin') {
            $request->validate([
                'patient_id' => 'required|integer',
                'start_date' => 'required|date',
                'appointment_count' => 'required|integer|min:1',
                'total_cost' => 'required|integer',
                'new_payment' => 'required|numeric|min:0',
            ]);
        }

        

        // calculating total days spent at the facility
        $start_date = \Carbon\Carbon::parse($request->$start_date);
        $currentDate = \Carbon\Carbon::now();

        // subtract the start date from the current date
        $totalDaysSpent = $currentDate->diffInDays($start_date);
            

        // price per appointment

        //multiply by appointment count, get appt_ct from doctors table
        $appointmentCost = 50.00; 
        $totalAppointmentCost = $appointmentCost * $request->appointment_count;



        // getting admission date from additional patient infos table
        $admissionInfo = DB::table('additional_patient_infos')
        ->where('patient_id', $request->input('patient_id'))
        ->get();



        // price per day based on admission date
        $daysAtFacilityCost = $totalDaysSpent * 10.00; //Multiply the number of days at the facility by $10.

        $totalDue = $totalAppointmentCost + $daysAtFacilityCost;
        // checking that total cost matches total due
        if ($request->total_cost != $totalDue){
            return redirect()->back()->withErrors(['total_cost' => 'Total cost does not match the calculated total due.']);
        }

        // saving payment information
        $payment = new Payment();
        $payment->patient_id = $request->input('patient_id');
        $payment->new_payment = $request->input('new_payment');
        $payment->total_due = $totalDue;
        $payment->save();

        return redirect()->route('admin')->with('success', 'Payment has been made successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }
}
