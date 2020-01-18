<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
    Route::get('/order', 'ProductController@showOrderPage')->name('showOrderPage');
    Route::post('/orderData', 'ProductController@order')->name('order');
    Route::get('/received', 'ProductController@receivedProductsForAdmin')->name('received');
});
