<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsPillsSchedule extends Model
{
    protected $table = 'patients_pills_schedule';
    use HasFactory;

    public function pills() {
        return $this->belongsToMany(Pill::class);
    }
}
