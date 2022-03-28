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

Route::group(
    [
        'route'        => '/'  
    ],
    function () {
        Route::get('/', 'ProductosController@index');
        Route::get('/show-prod/{id}', 'ProductosController@showProduct');
        Route::post('/update', 'ProductosController@update');
        Route::get('/create-product', 'ProductosController@create');
        Route::post('/insert-product', 'ProductosController@insertData');
        Route::post('/delete-product', 'ProductosController@delete');
        
    }
);
 