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
    @include 'admin.php';
});

Route::group(['prefix' => 'supplier', 'as' => 'supplier.', 'middleware' => 'supplier'], function (){
    @include 'supplier.php';
});

