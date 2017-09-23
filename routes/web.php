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

Route::post('/login', 'HomeController@login');
Route::post('/reset', 'HomeController@resetPassword');

Route::get('/is-auth', 'HomeController@isAuth');
Route::get('/', 'HomeController@index');
