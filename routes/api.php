<?php

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '2.0', 'middleware' => ['api']], function () {
    
    // Weather History
    Route::group(['prefix' => 'weathers'], function () {        
        Route::get('getbydate', [WeatherController::class, 'getByDate']);        
        Route::get('lastdays', [WeatherController::class, 'lastDays']);
    });

});
