<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsPillsLog extends Model
{
    use HasFactory;

    protected $table = 'patients_pills_log';

    protected $maps = [
        'taken_at' => 'takenAt',
        'p_p_schedule_id' => 'patientPillScheduleId'
    ];

    protected $appends = [
        'takenAt',
        'patientPillScheduleId'
    ];

    protected $hidden = [
        'taken_at',
        'p_p_schedule_id'
    ];

    public function getTakenAtAttribute()
    {
        $this->attributes['taken_at'];
    }

    public function getPatientPillScheduleAttribute()
    {
        $this->attributes['p_p_schedule_id'];
    }

    // Bulk inserts into log table.
    public static function insertAll(array $patients): bool
    {
        $dataToInsert = [];
        foreach ($patients as $patient) {
            $pills = $patient['pills'] ?? [];
            foreach ($pills as $pill) {
                if (isset($pill['schedule']) && is_array($pill['schedule'])) {
                    $dataToInsert [] = [
                        'p_p_schedule_id'  => $pill['schedule']['id'],
                    ];
                }
            }
        }
        return self::insert($dataToInsert);
    }
}
