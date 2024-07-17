<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PositionController;
use App\Models\Nationality;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('players', PlayerController::class);
    Route::apiResource('clubs', ClubController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('nationalities', NationalityController::class);
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('api.auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('api.auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.auth.logout')->middleware('auth:sanctum');
});
