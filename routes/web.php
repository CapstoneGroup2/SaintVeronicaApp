<?php

Route::get('/welcome', 'PagesController@landingPage');

Route::get('/login', 'Auth\MainController@index');

Route::post('/login', 'Auth\MainController@checklogin');

Route::middleware(['admin'])->group(function () {

    Route::get('/', function() {
        return redirect('/dashboard');
    });

    Route::get('/index', function() {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', 'PagesController@dashboard');

    Route::delete('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@destroy');
    
    Route::resource('/miscellaneous-and-other-fees', 'MiscellaneousAndOtherFeesController')->only([
        'create', 'store', 'edit', 'update', 
    ]);

    Route::delete('/users/{id}', 'UsersController@destroy');
    
    Route::resource('/users', 'UsersController');

    Route::resource('/classes', 'ClassesController')->only([
        'create', 'store', 'edit', 'update'
    ]);

    Route::resource('/announcements', 'AnnouncementsController');
});

Route::middleware(['registrar'])->group(function () {

    Route::get('/', function() {
        return redirect('/home');
    });

    Route::get('/index', function() {
        return redirect('/home');
    });

    Route::get('/home', 'PagesController@home');

    Route::get('/reports', 'PagesController@reports');
});

Route::middleware(['web'])->group(function () {
    
    Route::get('/logout', 'Auth\MainController@logout');

    Route::get('/students/classes/{id}', 'StudentsController@showStudentsByClass');

    Route::get('/students/payments/{id}/edit', 'StudentsController@showMiscellaneousAndOtherFeesAfterEnroll');

    Route::delete('/students/{id}', 'StudentsController@destroy');

    Route::resource('/students', 'StudentsController');
    
    Route::get('/miscellaneous-and-other-fees/classes/{id}', 'MiscellaneousAndOtherFeesController@showMiscellaneousAndOtherFees');
    
    Route::get('/miscellaneous-and-other-fees/{id}', 'MiscellaneousAndOtherFeesController@show');
    
    Route::get('/payments-history', 'PaymentsController@history');
    
    Route::patch('/payments/{id}', 'PaymentsController@update');

    Route::resource('/classes', 'ClassesController')->only([
        'index'
    ]);
});