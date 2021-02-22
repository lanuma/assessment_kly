<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/auth');


Route::group(['as' => 'auth.', 'prefix' => '/auth', 'middleware' => 'authentication'], function () {
    Route::get('/', 'AuthController@index')->name('index');
    Route::post('/', 'AuthController@login')->name('login')->middleware('throttle:10,1');
});

Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('data', 'AdminController');
    
    Route::resource('people', 'PeopleController');


    Route::get('/logout', 'AuthController@logout')->name('logout');
});
