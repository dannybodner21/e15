<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', [MainController::class, 'index']);

// Create new daily workout
Route::post('/dailyWorkout', [MainController::class, 'dailyWorkout']);

// Generate random daily workout
Route::post('/randomWorkout', [MainController::class, 'randomWorkout']);