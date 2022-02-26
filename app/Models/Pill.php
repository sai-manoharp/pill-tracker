<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pill extends Model
{
    use HasFactory;

    public function patients() {
        return $this->belongsToMany(Patient::class, 'patients_pills_schedule')
                    ->withPivot('schedule')
                    ->as('schedule');
    }
}
