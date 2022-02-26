<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PillController;
use App\Http\Controllers\PatientController;
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

Route::get('/pills', [PillController::class, 'get']);
Route::get('/patients', [PatientController::class, 'get']);
Route::get('/patients/schedule/{schedule}', [PatientController::class, 'patientsBySchedule']);
Route::get('/pills/{id}/patients', [PillController::class, 'patients']);