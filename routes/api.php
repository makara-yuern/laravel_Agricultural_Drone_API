<?php

<<<<<<< HEAD
use App\Http\Controllers\BatteryController;
use App\Http\Controllers\DroneController;
=======
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
>>>>>>> e2d1cd2395c4e52521dfce1f3f48a0a50eb526bd
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

<<<<<<< HEAD
// Route Battery
Route::resource('/Battery', BatteryController::class);

// Route Drone
Route::resource('/Drone', DroneController::class);
=======
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
>>>>>>> e2d1cd2395c4e52521dfce1f3f48a0a50eb526bd
