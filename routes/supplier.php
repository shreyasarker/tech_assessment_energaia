<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'products', 'as' => 'products.'], function (){
    Route::get('/orders', 'ProductController@receivedOrderForSupplier')->name('orders');
    Route::get('/send/{id}', 'ProductController@sendProductToAdmin')->name('send');
});

