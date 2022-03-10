<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::prefix('user')->group(function () {

        Route::get('/', 'AdminUsersController@index')->name('admin.user.index');

        Route::get('/create', 'AdminUsersController@create')->name('admin.user.create');

        Route::post('/store', 'AdminUsersController@store')->name('admin.user.store');

        Route::get('/edit/{id}', 'AdminUsersController@edit')->name('admin.user.edit');

        Route::post('/update/{id}', 'AdminUsersController@update')->name('admin.user.update');

        Route::get('/delete/{id}', 'AdminUsersController@delete')->name('admin.user.delete');

    

    });

});