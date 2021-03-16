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

    Route::get('/', 'PagesController@index');

    Route::get('/index', 'PagesController@index');

    Route::get('/students/grade-levels/{id}', 'StudentsController@showGradeLevelStudents');
    
    Route::get('/students/tutorials/{id}', 'StudentsController@showTutorialStudents');

    Route::resource('/students', 'StudentsController');

    Route::get('/miscellaneous-and-other-fees/grade-level/{id}', 'MiscellaneousAndOtherFeesController@showGradeLevelMiscellaneousAndOtherFeesAfterEnroll');
    
    Route::get('/miscellaneous-and-other-fees/tutorial/{id}', 'MiscellaneousAndOtherFeesController@showTutorialMiscellaneousAndOtherFeesAfterEnroll');

    Route::get('/miscellaneous-and-other-fees/grade-levels/{id}', 'MiscellaneousAndOtherFeesController@showGradeLevelMiscellaneousAndOtherFees');
    
    Route::get('/miscellaneous-and-other-fees/tutorials/{id}', 'MiscellaneousAndOtherFeesController@showTutorialMiscellaneousAndOtherFees');
    
    Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController');
    
    Route::resource('/payments', 'PaymentsController');
    
    Route::resource('/users', 'UsersController');
    
    Route::get('logout', 'Auth\MainController@logout');
});