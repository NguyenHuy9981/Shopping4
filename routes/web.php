<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('categories')->group(function () {

        Route::get('/', 'CategoryController@index')->name('categories.index')->middleware('can:list-category');
    
        Route::get('/create', 'CategoryController@create')->name('categories.create')->middleware('can:add-category');
    
        Route::post('/store', 'CategoryController@store')->name('categories.store');
    
        Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit')->middleware('can:edit-category');
    
        Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
    
        Route::get('/delete/{id}', 'CategoryController@delete')->name('categories.delete');
    });


    

    Route::prefix('product')->group(function () {

        Route::get('/', 'AdminProductController@index')->name('product.index');

        Route::get('/create', 'AdminProductController@create')->name('product.create');

        Route::post('/store', 'AdminProductController@store')->name('product.store');
        
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('product.edit');

        Route::post('/update/{id}', 'AdminProductController@update')->name('product.update');

        Route::get('/delete/{id}', 'AdminProductController@delete')->name('product.delete');
    
    });

    Route::prefix('slider')->group(function () {

        Route::get('/', 'SliderController@index')->name('slider.index');

        Route::get('/create', 'SliderController@create')->name('slider.create');

        Route::post('/store', 'SliderController@store')->name('slider.store');
        
        Route::get('/edit/{id}', 'SliderController@edit')->name('slider.edit');

        Route::post('/update/{id}', 'SliderController@update')->name('slider.update');

        Route::get('/delete/{id}', 'SliderController@delete')->name('slider.delete');
    });

    Route::prefix('setting')->group(function () {

        Route::get('/', 'SettingController@index')->name('setting.index');

        Route::get('/create', 'SettingController@create')->name('setting.create');

        Route::post('/store', 'SettingController@store')->name('setting.store');

        Route::get('/edit/{id}', 'SettingController@edit')->name('setting.edit');

        Route::post('/update/{id}', 'SettingController@update')->name('setting.update');

        Route::get('/delete/{id}', 'SettingController@delete')->name('setting.delete');

    });

    

    Route::prefix('role')->group(function () {

        Route::get('/', 'AdminRoleController@index')->name('role.index');

        Route::get('/create', 'AdminRoleController@create')->name('role.create');

        Route::post('/store', 'AdminRoleController@store')->name('role.store');

        Route::get('/edit/{id}', 'AdminRoleController@edit')->name('role.edit');

        Route::post('/update/{id}', 'AdminRoleController@update')->name('role.update');
        

    });

    Route::prefix('permission')->group(function () {

        Route::get('/', 'AdminPermissionController@index')->name('permission.index');

        Route::get('/create', 'AdminPermissionController@create')->name('permission.create');

        Route::post('/store', 'AdminPermissionController@store')->name('permission.store');

        
        

    });

});









