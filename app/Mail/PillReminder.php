<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PillReminder extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $patientPillData;
     protected $schedule;
     protected $uuid;

    public function __construct($patientPillData, $schedule, $uuid)
    {
        $this->patientPillData = $patientPillData;
        $this->schedule = $schedule;
        $this->uuid = $uuid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pill.reminder')
            ->to('manoharsai566@gmail.com')
            ->with([
                    'patientPillData' => $this->patientPillData,
                    'schedule' => $this->schedule,
                    'url' => env('APP_URL') . '/api/pillsLog/' . $this->uuid
                ]);
    }
}
