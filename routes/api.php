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

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::post('login', 'AuthController@login');
    Route::get('account', 'AuthController@account');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout'); 
});