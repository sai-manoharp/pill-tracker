<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Helpers\PatientDataHelper;
use Illuminate\Support\Collection;

class PatientController extends Controller
{
    // Get all Patients
    public function get(): Collection
    {
        $pills = Patient::all();
        return $pills;
    }

    // Gets patients data by schedule. Ex gets all the patients who has a pill in afternoon.
    public function patientsBySchedule($schedule): array
    {
        return PatientDataHelper::getPatientsBySchedule($schedule);
    }
}
