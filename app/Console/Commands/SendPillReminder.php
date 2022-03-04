<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\PatientDataHelper;
use App\Mail\PillReminder;
use App\Models\PatientsPillsLog;
use Illuminate\Support\Facades\Mail;

class SendPillReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendPillReminder {--schedule=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends pill reminder to patients.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schedule = $this->option('schedule');
        $patients = PatientDataHelper::getPatientsBySchedule($schedule);
        foreach ($patients as $patient) {
            // Email channel
            Mail::send(new PillReminder($patient, $schedule));
            // Whatsapp Channel
        }
        // Insert records into log table.
        PatientsPillsLog::insertAll($patients);
    }
}
