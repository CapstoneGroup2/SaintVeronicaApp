<?php

Route::get('/login', 'Auth\MainController@index');

Route::post('/login', 'Auth\MainController@checklogin');

Route::middleware(['admin'])->group(function () {

    Route::get('/', function() {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', 'PagesController@dashboard');

    Route::delete('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@destroy');
    
    Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController');

    Route::delete('/users/{id}', 'UsersController@destroy');
    
    Route::resource('/users', 'UsersController');

    Route::resource('/classes', 'ClassesController')->only([
        'create', 'store', 'edit', 'update'
    ]);
});

Route::middleware(['registrar'])->group(function () {

    Route::get('/', function() {
        return redirect('/home');
    });

    Route::get('/home', 'PagesController@home');

    Route::resource('/announcements', 'AnnouncementsController')->only([
        'delete', 'create'
    ]);
});

Route::middleware(['web'])->group(function () {
    
    Route::get('/logout', 'Auth\MainController@logout');

    Route::get('/reports', 'PagesController@reports');

    Route::get('/students/classes/{id}', 'StudentsController@showStudentsByClass');

    Route::get('/students/payments/{id}/edit', 'StudentsController@showMiscellaneousAndOtherFeesAfterEnroll');

    Route::delete('/students/{id}', 'StudentsController@destroy');

    Route::resource('/students', 'StudentsController');
    
    Route::get('/miscellaneous-and-other-fees/classes/{id}', 'MiscellaneousAndOtherFeesController@showMiscellaneousAndOtherFees');
    
    Route::get('/payments-history', 'PaymentsController@history');
    
    Route::patch('/payments/{id}', 'PaymentsController@update');

    Route::resource('/announcements', 'AnnouncementsController')->only([
        'update', 'index'
    ]);

    Route::resource('/classes', 'ClassesController')->only([
        'index'
    ]);
});