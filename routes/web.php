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
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
function()
{
    Route::get('/', 'MainController@index');

    Route::get('/admin', function() {
        return view('layouts.admin');
    });

    Route::get('/cart', function() {
        return view('cart');
    });

    Route::get('/search', 'MainController@search');

    Route::get('/signup', function() {
        return view('signup');
    });
});

Route::post('/getCart', 'CartController@get');
Route::post('/createOrder', 'Admin\OrderController@create');
Route::post('/searchProduct', 'MainController@searchAjax');