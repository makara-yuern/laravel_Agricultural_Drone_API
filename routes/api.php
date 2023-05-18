<?php

use App\Http\Controllers\BatteryController;
use App\Http\Controllers\DroneController;
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

// Route Battery
Route::resource('/Battery', BatteryController::class);

// Route Drone
Route::resource('/Drone', DroneController::class);