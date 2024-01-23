<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::get('prize-wheel', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'index']);
    Route::post('prize-wheel', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'store']);
    Route::get('prize-check-user/{phone}', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'checkUser']);
    Route::get('prize-event/{slug}', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'getEvent']);
    Route::get('prize-user', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'getUser']);
    Route::get('prize/{event_id}', [\App\Http\Controllers\Api\V1\PrizeWheelController::class, 'getPrize']);
});
