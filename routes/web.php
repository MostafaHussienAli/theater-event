<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('dashboard.locales')->group(function () {
    Auth::routes();
});

Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');



Route::as('front.')->group(function () {
    Route::get('/', 'Frontend\FrontendController@index')->name('home');
});

