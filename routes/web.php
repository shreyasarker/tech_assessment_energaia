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

Route::get('/', 'AuthController@showLoginForm')->name('showLoginForm');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
        Route::get('/order', 'ProductController@showOrderPage')->name('showOrderPage');
        Route::post('/orderData', 'ProductController@order')->name('order');
    });
});

Route::group(['prefix' => 'supplier', 'as' => 'supplier.', 'middleware' => 'supplier'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
});

