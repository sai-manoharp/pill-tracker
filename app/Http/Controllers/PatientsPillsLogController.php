<?php

namespace App\Http\Controllers;

use App\Models\PatientsPillsLog;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PatientsPillsLogController extends Controller
{
    /*
        TODO: Handle return types. Should be in a certain format.
        Use interface/class to standardize the return data.
    */
    public function taken(string $uuid): string
    {
        if (!Str::of($uuid)->isUuid()) {
            throw new HttpException(400, 'UUID is not in correct format');
        }

        $status = PatientsPillsLog::getLogStatus();
        try {
            PatientsPillsLog::where([
                ['patient_log_uuid', $uuid],
                ['status', '<>', $status['taken']]
            ])->update([
                'status' => $status['taken'],
                'taken_at' => Carbon::now()
            ]);
        } catch (Exception $ex) {
            throw new HttpException(
                500,
                'There was an unexpected error while updating your preference. ' .
                'Please try after sometime. ' .
                'Error - ' . $ex->getMessage()
            );
        }
        return 'Preference updated successfully.';
    }

    /*
        TODO: Repeated code, fix it.
    */
    public function postpone(string $uuid): string
    {
        if (!Str::of($uuid)->isUuid()) {
            throw new HttpException(400, 'UUID is not in correct format');
        }

        $status = PatientsPillsLog::getLogStatus();
        try {
            PatientsPillsLog::where([
                ['patient_log_uuid', $uuid],
                ['status', '<>', $status['postpone']]
            ])->update([
                'status' => $status['postpone']
            ]);
        } catch (Exception $ex) {
            throw new HttpException(
                500,
                'There was an unexpected error while updating your preference. ' .
                'Please try after sometime. ' .
                'Error - ' . $ex->getMessage()
            );
        }
        return 'Preference updated successfully.';
    }
}
