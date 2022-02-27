<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function pills() {
        return $this->belongsToMany(Pill::class, 'patients_pills_schedule');
    }
    public function pillsBySchedule($schedule){
        return $this->belongsToMany(Pill::class, 'patients_pills_schedule')
                    ->withPivot('schedule')
                    ->as('schedule')
                    ->wherePivot('schedule', $schedule);
    }
}
