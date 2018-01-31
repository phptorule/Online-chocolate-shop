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

Route::get('/', 'MainController@index');

Route::get('/admin', function() {
    return view('layouts.admin');
});

Route::get('/cart', function() {
    return view('cart');
});

Route::get('/signup', function() {
    return view('signup');
});