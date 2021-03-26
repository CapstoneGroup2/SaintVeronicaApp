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

Route::middleware(['admin'])->group(function () {

    Route::get('/', function() {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', 'PagesController@dashboard');

    Route::get('/students', 'StudentsController@index');

    // Route::get('/reports', 'PagesController@reports');

    // Route::get('/students/classes/{id}', 'StudentsController@showStudentsByClass');

    // Route::delete('/students/{id}', 'StudentsController@destroy');

    // Route::resource('/students', 'StudentsController');

    // Route::get('/students/miscellaneous-and-other-fees/classes/{id}', 'StudentsController@showMiscellaneousAndOtherFeesAfterEnroll');
    
    Route::get('/miscellaneous-and-other-fees/classes/{id}', 'MiscellaneousAndOtherFeesController@showMiscellaneousAndOtherFees');

    Route::delete('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@destroy');
    
    Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController');
    
    // Route::get('/payments-history', 'PaymentsController@history');
    
    // Route::patch('/payments/{id}', 'PaymentsController@update');

    Route::delete('/users/{id}', 'UsersController@destroy');
    
    Route::resource('/users', 'UsersController');

    Route::resource('/classes', 'ClassesController');

    // Route::resource('/announcements', 'AnnouncementsController');
});

Route::middleware(['web'])->group(function () {
    
    Route::get('/logout', 'Auth\MainController@logout');

    // Route::get('/dashboard', 'PagesController@dashboard');

    Route::get('/reports', 'PagesController@reports');

    Route::get('/students/{id}', 'StudentsController@show');

    // Route::get('/students/classes/{id}', 'StudentsController@showStudentsByClass');

    // Route::delete('/students/{id}', 'StudentsController@destroy');

    // Route::resource('/students', 'StudentsController');

    // Route::get('/students/miscellaneous-and-other-fees/classes/{id}', 'StudentsController@showMiscellaneousAndOtherFeesAfterEnroll');
    
    // Route::get('/miscellaneous-and-other-fees/classes/{id}', 'MiscellaneousAndOtherFeesController@showMiscellaneousAndOtherFees');

    // Route::delete('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@destroy');
    
    // Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController');
    
    Route::get('/payments-history', 'PaymentsController@history');
    
    // Route::patch('/payments/{id}', 'PaymentsController@update');

    // Route::delete('/users/{id}', 'UsersController@destroy');
    
    // Route::resource('/users', 'UsersController');

    // Route::resource('/classes', 'ClassesController');

    Route::resource('/announcements', 'AnnouncementsController')->only([
        'update', 'index'
    ]);
});

Route::middleware(['registrar'])->group(function () {

    Route::get('/', function() {
        return redirect('/home');
    });

    Route::get('/home', 'PagesController@home');

    // Route::get('/reports', 'PagesController@reports');

    Route::get('/students/classes/{id}', 'StudentsController@showStudentsByClass');

    Route::delete('/students/{id}', 'StudentsController@destroy');

    Route::get('/students/create', 'StudentsConroller@create');

    Route::resource('/students', 'StudentsController')->only([
        'create', 'edit', 'store', 'update'
    ]);

    Route::get('/students/miscellaneous-and-other-fees/classes/{id}', 'StudentsController@showMiscellaneousAndOtherFeesAfterEnroll');
    
    // Route::get('/miscellaneous-and-other-fees/classes/{id}', 'MiscellaneousAndOtherFeesController@showMiscellaneousAndOtherFees');

    // Route::delete('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@destroy');
    
    // Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController');
    
    // Route::get('/payments-history', 'PaymentsController@history');
    
    Route::patch('/payments/{id}', 'PaymentsController@update');

    Route::resource('/announcements', 'AnnouncementsController')->only([
        'delete', 'create'
    ]);

    // Route::delete('/users/{id}', 'UsersController@destroy');
    
    // Route::resource('/users', 'UsersController');

    // Route::resource('/classes', 'ClassesController');

    // Route::resource('/announcements', 'AnnouncementsController');
    
    // Route::get('logout', 'Auth\MainController@logout');
});