<?php

use App\Http\Controllers\Api\InvoiceController;
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

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {

    // Events
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('', [InvoiceController::class, 'getAll']);
        Route::get('{event}', [InvoiceController::class, 'getEvent']);
        Route::post('', [InvoiceController::class, 'store']);
        Route::delete('{invoice}', [InvoiceController::class, 'destroy']);
        Route::post('/update-status/{invoice}', [InvoiceController::class, 'updatePaidStatus']);
    });

});

Route::group(['prefix' => '2.0', 'middleware' => ['api']], function () {
    
    Route::group(['prefix' => 'weathers'], function () {
        // Weather History
        /* 
        {
            "jsonrpc": "2.0", 
            "method": "weather.getByDate", 
            "params": {"date": "2020-08-26"}, 
            "id": 1
        }
        
        */
        
        Route::get('getbydate', [WeatherController::class, 'getByDate']);
        

        // получить за последние  30 дней
        // {"jsonrpc": "2.0", "method": "weather.getHistory", "params": {"lastDays": 30}, "id": 1}
        Route::get('lastdays', [WeatherController::class, 'lastDays']);
    });

});
