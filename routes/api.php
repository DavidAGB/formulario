<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsecutiveController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'consecutives', 'as' => 'consecutives.'], function () {

    
    Route::get('/get_consecutive', [ConsecutiveController::class, 'getConsecutiveData'])->name('get_consecutiveData');

    Route::get('/get_monitor_data', [ConsecutiveController::class, 'getMonitorData'])->name('get_monitorinData');

    Route::post('/save_consecutives_data', [ConsecutiveController::class, 'saveConsecutives'])->name('save_consecutives');
  
    Route::get('/get_nacs', [ConsecutiveController::class, 'getNacsData'])->name('get_nacs_data');

    Route::get('/get_cultural', [ConsecutiveController::class, 'getCulturalRightsData'])->name('get_cultural_rights_data');

    Route::get('/get_expertises', [ConsecutiveController::class, 'getExpertisesData'])->name('get_expertises_data');

 
     
});
