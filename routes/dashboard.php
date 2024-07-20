<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/

Route::get('/', 'DashboardController@index')->name('home');


// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Countries
Route::resource('countries', 'CountryController');
Route::get('status/countries/{country}', 'CountryController@status')->name('countries.status');
Route::resource('countries.cities', 'CityController')->except('create');
Route::resource('cities.areas', 'AreaController')->except('create', 'show');

// Attendees Routes.
Route::get('trashed/attendees', 'AttendeeController@trashed')->name('attendees.trashed');
Route::get('trashed/attendees/{trashed_attendee}', 'AttendeeController@show')->name('attendees.trashed.show');
Route::post('attendees/{trashed_attendee}/restore', 'AttendeeController@restore')->name('attendees.restore');
Route::delete('attendees/{trashed_attendee}/forceDelete', 'AttendeeController@forceDelete')->name('attendees.forceDelete');
Route::resource('attendees', 'AttendeeController');
Route::get('status/attendees/{attendee}', 'AttendeeController@status')->name('attendees.status');

// EventDays Routes.
Route::get('trashed/event-days', 'EventDayController@trashed')->name('event-days.trashed');
Route::get('trashed/event-days/{trashed_event_day}', 'EventDayController@show')->name('event-days.trashed.show');
Route::post('event-days/{trashed_event_day}/restore', 'EventDayController@restore')->name('event-days.restore');
Route::delete('event-days/{trashed_event_day}/forceDelete', 'EventDayController@forceDelete')->name('event-days.forceDelete');
Route::resource('event-days', 'EventDayController');
Route::get('status/event-days/{event_day}', 'EventDayController@status')->name('event-days.status');

// Movies Routes.
Route::get('trashed/movies', 'MovieController@trashed')->name('movies.trashed');
Route::get('trashed/movies/{trashed_movie}', 'MovieController@show')->name('movies.trashed.show');
Route::post('movies/{trashed_movie}/restore', 'MovieController@restore')->name('movies.restore');
Route::delete('movies/{trashed_movie}/forceDelete', 'MovieController@forceDelete')->name('movies.forceDelete');
Route::resource('movies', 'MovieController');
Route::get('status/movies/{movie}', 'MovieController@status')->name('movies.status');

// Showtimes Routes.
Route::get('trashed/showtimes', 'ShowtimeController@trashed')->name('showtimes.trashed');
Route::get('trashed/showtimes/{trashed_showtime}', 'ShowtimeController@show')->name('showtimes.trashed.show');
Route::post('showtimes/{trashed_showtime}/restore', 'ShowtimeController@restore')->name('showtimes.restore');
Route::delete('showtimes/{trashed_showtime}/forceDelete', 'ShowtimeController@forceDelete')->name('showtimes.forceDelete');
Route::resource('showtimes', 'ShowtimeController');
Route::get('status/showtimes/{showtime}', 'ShowtimeController@status')->name('showtimes.status');

// EventDayShowtimes Routes.
Route::get('trashed/event-day-showtimes', 'EventDayShowtimeController@trashed')->name('event-day-showtimes.trashed');
Route::get('trashed/event-day-showtimes/{trashed_event_day_showtime}', 'EventDayShowtimeController@show')->name('event-day-showtimes.trashed.show');
Route::post('event-day-showtimes/{trashed_event_day_showtime}/restore', 'EventDayShowtimeController@restore')->name('event-day-showtimes.restore');
Route::delete('event-day-showtimes/{trashed_event_day_showtime}/forceDelete', 'EventDayShowtimeController@forceDelete')->name('event-day-showtimes.forceDelete');
Route::resource('event-day-showtimes', 'EventDayShowtimeController');
Route::get('status/event-day-showtimes/{event_day_showtime}', 'EventDayShowtimeController@status')->name('event-day-showtimes.status');
