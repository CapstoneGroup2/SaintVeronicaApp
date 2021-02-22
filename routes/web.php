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

Route::get('/login', function() {
    return view('layouts.login');
})->name('login');

Route::get('/', 'PagesController@index')->name('index');

Route::get('/enrollees', 'PagesController@enrollees')->name('enrollees');

Route::get('/payments', 'PagesController@payments')->name('payments');

// Route::get('/login', 'PagesController@login')->name('login');
