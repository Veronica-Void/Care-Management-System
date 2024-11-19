<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Roster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class AppointmentController extends Controller
{
      public function appointment()
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }
        $patient = "None";
        $patient_id = "None";
        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');
        return view("auth.makeAppointment", compact("doctors"), compact("patient", "patient_id"));
    }

    // Gets the patient by ID from the request
    public function getPatient(Request $request)
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }
        if (count(DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->pluck('id', 'f_name')) > 0) {
            $patient = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('f_name');
            $patient_id = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('id');
        }
        else {
            $patient = "None";
            $patient_id = "None";
        }
        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');
        return view("auth.makeAppointment", compact("doctors"), compact("patient", "patient_id"));
    }

    // Adds a new appointment
    public function makeAppointment(Request $request)
    {
        if ((Session::get('role') !== 'admin') and (Session::get('role') !== 'supervisor')) {
            return back()->with('fail','You must be an admin');
        }

        if (count(DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->pluck('id', 'f_name')) > 0) {
            $patient = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('f_name');
            $patient_id = DB::table('users')->where('role', 'patient')->where('id', $request->id)->get()->value('id');
        }
        else {
            $patient = "None";
            $patient_id = "None";
        }

        $doctors = DB::table('users')->where('role', 'doctor')->get()->pluck('f_name');

        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->appt_date = $request->dob;
        $appointment->doctor = $request->doctor;
        $appointment->patient_name = $request->patient_name;
        $appointment->save();

        return view("auth.makeAppointment", compact("doctors"), compact("patient", "patient_id"));
    }
}



