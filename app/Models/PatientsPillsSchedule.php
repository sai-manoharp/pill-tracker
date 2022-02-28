<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PatientsPillsSchedule extends Pivot
{
    protected $table = 'patients_pills_schedule';

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
