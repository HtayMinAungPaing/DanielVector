<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('hospitals','HospitalController');
Route::resource('abouts','AboutController');
Route::resource('contacts','ContactController');

Route::middleware(["auth"])->group(function(){    
    Route::resource('accounts','AccountController');
    Route::resource('bookings','BookingController');
    Route::resource('bookeds','BookedController');
});

Route::get('/home', 'HomeController@index')->name('home');
