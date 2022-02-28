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

    public function __construct($patientPillData, $schedule)
    {
        $this->patientPillData = $patientPillData;
        $this->schedule = $schedule;
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
                    'schedule' => $this->schedule
                ]);
    }
}
