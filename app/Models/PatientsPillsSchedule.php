<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PatientsPillsSchedule extends Pivot
{
    protected $table = 'patients_pills_schedule';

    protected $maps = [
        'pill_id' => 'pillId',
        'patient_id' => 'patientId'
    ];

    protected $appends = [
        'pillId', 'patientId'
    ];

    protected $hidden = [
        'pill_id', 'patient_id'
    ];

    public function getPatientIdAttribute(): int
    {
        return $this->attributes['patient_id'];
    }

    public function getPillIdAttribute(): int
    {
        return $this->attributes['pill_id'];
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    public function pills()
    {
        return $this->belongsToMany(Pill::class);
    }
}
