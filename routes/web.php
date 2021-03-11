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

Route::get('/login', 'Auth\MainController@index');
Route::post('/login', 'Auth\MainController@checklogin');

Route::group(['middleware' => 'web'], function() {
    Route::resource('/students', 'StudentsController');

    Route::get('/', 'PagesController@index');

    Route::get('/index', 'PagesController@index');
    
    Route::resource('/items', 'ItemsController');
    
    Route::resource('/payments', 'PaymentsController');

    Route::resource('/students/gradelevels', 'GradeLevelsController');
    
    Route::resource('/students/tutorials', 'TutorialsController');
    
    Route::resource('/users', 'UsersController');
    
    Route::get('logout', 'Auth\MainController@logout');
});