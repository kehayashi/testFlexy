<?php

Route::get('/', function () {
    return view('template_main');
});

Route::get('/form_store_product', 'ProductController@redirect_form_product');

Route::post('/store_product', 'ProductController@store_product');

Route::get('/home', 'ProductController@redirect_home');

Route::get('/list_products', 'ProductController@list_products');

Route::get('/update/loadProduct/{id}', 'ProductController@load_product');

Route::get('/list_products', 'ProductController@list_products');

Route::get('/delete/deleteProduct/{id}', 'ProductController@delete_product');

Route::post('/update/loadProduct/update_store_product', 'ProductController@update_store_product');
