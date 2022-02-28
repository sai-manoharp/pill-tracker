<?php

namespace App\Http\Controllers;

use App\Models\PatientsPillsSchedule;
use Illuminate\Http\Request;

class PatientsPillsScheduleController extends Controller
{
    // Get all schedules
    public function get(): array
    {
        return PatientsPillsSchedule::all()->toArray();
    }
}
