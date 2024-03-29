<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\App;

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

// Save daily workout
Route::post('/saveWorkout', [MainController::class, 'saveWorkout']);

// Show a saved workout
Route::get('/workout/{id}', [MainController::class, 'showWorkout']);

// Delete a user's workout
Route::post('/deleteWorkout/{id}', [MainController::class, 'deleteWorkout']);

// Only enable the following development-specific routes if we’re *not* running the application in the `production` environment
if (!App::environment('production')) {
    Route::get('/test/loginAs/{userId}', [TestController::class, 'loginAs']);
    Route::get('/test/refreshDatabase', [TestController::class, 'refreshDatabase']);
}