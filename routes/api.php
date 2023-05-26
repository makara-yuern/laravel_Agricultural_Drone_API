<?php

use App\Http\Controllers\BatteryController;
use App\Http\Controllers\DroneController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Models\Map;
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

// -----------------------API Route for user-----------------------------------------
Route::get('/users', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

// -----------------------API Route for plan-----------------------------------------
Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plan', [PlanController::class, 'store']);
Route::get('/plan/{id}', [PlanController::class, 'show']);
Route::put('/plan/{id}', [PlanController::class, 'update']);
Route::delete('/plan/{id}', [PlanController::class, 'destroy']);

// -----------------------API Route for map-----------------------------------------
Route::get('/maps', [MapController::class, 'index']);
Route::post('/map', [MapController::class, 'store']);
Route::get('/map/{id}', [MapController::class, 'show']);
Route::put('/map/{id}', [MapController::class, 'update']);
Route::delete('/map/{id}', [MapController::class, 'destroy']);

// -----------------------API Route for location-----------------------------------------
Route::get('/locations', [LocationController::class, 'index']);
Route::post('/location', [LocationController::class, 'store']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::put('/location/{id}', [LocationController::class, 'update']);
Route::delete('/location/{id}', [LocationController::class, 'destroy']);

// -----------------------API Route for farmer-----------------------------------------
Route::get('/farmers', [FarmerController::class, 'index']);
Route::post('/farmer', [FarmerController::class, 'store']);
Route::get('/farmer/{id}', [FarmerController::class, 'show']);
Route::put('/farmer/{id}', [FarmerController::class, 'update']);
Route::delete('/farmer/{id}', [FarmerController::class, 'destroy']);

// -----------------------API Route for farm-----------------------------------------
Route::get('/farms', [FarmController::class, 'index']);
Route::post('/farm', [FarmController::class, 'store']);
Route::get('/farm/{id}', [FarmController::class, 'show']);
Route::put('/farm/{id}', [FarmController::class, 'update']);


// -----------------------API Route for drone-----------------------------------------
Route::get('/drones', [DroneController::class, 'index']);
Route::post('/drone', [DroneController::class, 'store']);
Route::get('/drone/{id}', [DroneController::class, 'show']);
Route::put('/drone/{id}', [DroneController::class, 'update']);
Route::delete('/drone/{id}', [DroneController::class, 'destroy']);

// -----------------------API Route for battery-----------------------------------------
Route::get('/batteries', [BatteryController::class, 'index']);
Route::post('/battery', [BatteryController::class, 'store']);
Route::get('/battery/{id}', [BatteryController::class, 'show']);
Route::put('/battery/{id}', [BatteryController::class, 'update']);
Route::delete('/battery/{id}', [BatteryController::class, 'destroy']);

// -----------------------Route of all requirement-----------------------------------------
Route::get('/getDroneLocation/{id}', [DroneController::class, 'getDroneLocation']);
Route::get('/getData/{name}/{id}', [FarmController::class, 'downloagImage']);
Route::get('/instruction', [DroneController::class, 'getInstruction']);
Route::get('/getPlans/{name}', [PlanController::class, 'getPlansOrder66']);
Route::post('/maps/{area}/{farm_id}', [MapController::class, 'storeImage']);