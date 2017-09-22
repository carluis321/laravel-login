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

Route::middleware(['web'])->group(function (){
	Route::get('/login', 'HomeController@showLogin')->name('login');

	Route::post('/login', 'HomeController@login');

	Route::get('/reset-password', 'HomeController@showReset');
	Route::post('/reset', 'HomeController@resetPassword');
});

Route::middleware(['auth', 'web'])->group(function (){
	Route::get('/', 'HomeController@dashboard');
});
