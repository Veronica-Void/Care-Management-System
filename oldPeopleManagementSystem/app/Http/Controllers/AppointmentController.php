<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    // USE $appointment
    public function appointment()
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }
        $patient = "None";
        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');
        return view("auth.makeAppointment", compact("doctors"), compact("patient"));
    }

    // Gets the patient by ID from the request
    public function getPatient(Request $request)
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }
        if (count(DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->pluck('f_name')) > 0) {
            $patient = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('f_name');
        }
        else {
            $patient = "None";
        }
        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');
        return view("auth.makeAppointment", compact("doctors"), compact("patient"));
    }

    // Adds a new appointment
    public function makeAppointment(Request $request)
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }
        $request->validate([
            'id' => 'required',
            'dob' => 'required',
            'patient_name' => 'required',
        ]);
        $appointment = new Appointment();
        $appointment->patient_id = $request->id;
        $appointment->dob = $request->dob;
        $appointment->doctor = $request->doctor;
        $appointment->patient_name = $request->patient_name;
        $appointment->save();
        if (count(DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->pluck('f_name')) > 0) {
            $patient = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('f_name');
        }
        else {
            $patient = "None";
        }
        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');
        return view("auth.makeAppointment", compact("doctors"), compact("patient"));
    }
}
