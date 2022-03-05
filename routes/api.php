<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PillController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientsPillsLogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Don't expose APIs on production. 
if (!App::environment('production')) {
    Route::get('/pills', [PillController::class, 'get']);
    Route::get('/patients', [PatientController::class, 'get']);
    Route::get('/patients/schedule/{schedule}', [PatientController::class, 'patientsBySchedule']);
    Route::get('/pills/{id}/patients', [PillController::class, 'patients']);    
}

// Pubic APIs.
Route::get('/pillsLog/{uuid}/taken', [PatientsPillsLogController::class, 'taken']);
Route::get('/pillsLog/{uuid}/postpone', [PatientsPillsLogController::class, 'postpone']);