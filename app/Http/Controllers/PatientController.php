<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Get all Patients
    public function get() {
        $pills = Patient::find(1)->pills()->get();
        return $pills;
    }

    public function patientsBySchedule($schedule) {
        $schedule = 'morning';
        $patients = Patient::find(1)->pillsBySchedule($schedule)->get();
        return $patients;
    }
}
