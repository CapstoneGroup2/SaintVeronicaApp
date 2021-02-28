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

Route::get('/index', 'PagesController@index')->name('index')->middleware('web');
Route::get('/payments', 'PagesController@payments')->name('payments');

Route::resource('/students', 'StudentsController')->middleware('web');

Route::resource('/items', 'ItemsController')->middleware('web');

Route::resource('/payments', 'PaymentsController')->middleware('web');

Route::resource('/users', 'UsersController')->middleware('web');