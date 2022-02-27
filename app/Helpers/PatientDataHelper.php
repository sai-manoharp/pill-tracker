<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Models\Patient;

Class PatientDataHelper
{
    public static function getPatientsBySchedule($schedule): array {
        $patients = Patient::distinct()->get()->toArray();
        foreach($patients as $key => &$patient) {
            $pills = Patient::find($patient['id'])
                ->pillsBySchedule($schedule)
                ->get()
                ->toArray();
            
            if (!count($pills)) {
                unset ($patients[$key]);
            }
            $patient ['pills'] = $pills;
        }        
        return $patients ?? [];
    }
}