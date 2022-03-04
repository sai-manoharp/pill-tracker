<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patient extends Model
{
    use HasFactory;

    protected $maps = [
        'country_code' => 'countryCode',
        'mobile_number' => 'mobileNumber'
    ];
    
    protected $hidden = [
        'country_code', 'mobile_number', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'countryCode', 'mobileNumber'
    ];

    public function getCountryCodeAttribute(): int
    {
        return $this->attributes['country_code'];
    }

    public function getMobileNumberAttribute(): int
    {
        return $this->attributes['mobile_number'];
    }

    public function pills(): BelongsToMany
    {
        return $this->belongsToMany(Pill::class, 'patients_pills_schedule');
    }

    public function pillsBySchedule($schedule): BelongsToMany
    {
        return $this->belongsToMany(Pill::class, 'patients_pills_schedule')
                    ->using(PatientsPillsSchedule::class)
                    ->withPivot('schedule', 'id')
                    ->as('schedule')
                    ->wherePivot('schedule', $schedule);
    }
}
