<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::get('account', 'AuthController@account');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout'); 
});

Route::prefix('product')->namespace('Admin')->group(function() {
    Route::post('add', 'ProductController@add');
    Route::get('get/{id?}', 'ProductController@get');
    Route::post('edit', 'ProductController@edit');
    Route::delete('delete/{id}', 'ProductController@delete');
});

Route::prefix('category')->namespace('Admin')->group(function() {
    Route::get('get/{id?}', 'CategoryController@get');
    Route::post('edit', 'CategoryController@edit');
    Route::delete('delete/{id}', 'CategoryController@delete');
});

Route::prefix('order')->namespace('Admin')->group(function() {
    Route::get('get', 'OrderController@get');
});

