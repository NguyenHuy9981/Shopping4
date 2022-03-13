<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('menus')->group(function () {

        Route::get('/', 'MenuController@index')->name('menus.index')->middleware('can:list-menu');
    
        Route::get('/create', 'MenuController@create')->name('menus.create')->middleware('can:add-menu');
    
        Route::post('/store', 'MenuController@store')->name('menus.store');
    
        Route::get('/edit/{id}', 'MenuController@edit')->name('menus.edit')->middleware('can:edit-menu');
    
        Route::post('/update/{id}', 'MenuController@update')->name('menus.update');

        Route::get('/delete/{id}', 'MenuController@delete')->name('menus.delete')->middleware('can:delete-menu');
    
    });


});