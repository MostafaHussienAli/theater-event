<?php

use App\Http\Controllers\Api\SelectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group and "App\Http\Controllers\Api" namespace.
| and "api." route's alias name. Enjoy building your API!
|
*/

//Route::post('home', [HomeController::class, 'index'])->name('app_home');

// Selection Apis
Route::prefix('select')->as('select.')->group(function () {
    Route::get('event-day-dates', [SelectController::class, 'eventDayDates'])->name('event-day-dates');
    Route::get('event-day-showtimes', [SelectController::class, 'eventDayShowtimes'])->name('event-day-showtimes');
    Route::get('event-day-movies', [SelectController::class, 'eventDayMovies'])->name('event-day-movies');
});
