<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('/', [PageController::class, 'welcome']);

// Calculate the projections
Route::get('/calculate', [PageController::class, 'calculate']);




// EXAMPLES:
//Route::get('/contact', [PageController::class, 'contact']);

# Filter route that was used to demonstrate working with multiple route parameters
//Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);


/**
 * Books
 */
//Route::get('/books', [BookController::class, 'index']);

# Make sure the create route comes before the `/books/{slug}` route so it takes precedence
//Route::get('/books/create', [BookController::class, 'create']);

# Note the use of the post method in this route
//Route::post('/books', [BookController::class, 'store']);

//Route::get('/books/{slug}', [BookController::class, 'show']);