<?php
declare(strict_types=1);

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
    
    // Gets patients data by schedule. Ex gets all the patients who has a pill in afternoon.
    public function patientsBySchedule($schedule) {
        $patients = Patient::distinct()->get();
        foreach($patients as $key =>$patient) {
            $pills = Patient::find($patient['id'])->pillsBySchedule($schedule)->get();
            if (!count($pills)) {
                unset ($patients[$key]);
            }
            $patient ['pills'] = $pills;
        }
        return $patients;
    }
}
