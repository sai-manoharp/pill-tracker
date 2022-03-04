<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pill extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'patients_pills_schedule')
                    ->using(PatientsPillsSchedule::class)
                    ->withPivot('schedule')
                    ->as('schedule');
    }
}
