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
    Route::get('/payment', 'PaymentController@payment');
    Route::get('/pay', 'PaymentController@pay');
    Route::get('/search', 'MainController@search');
    Route::get('/admin', function() {
        return view('layouts.admin');
    });

    Route::get('/cart', function() {
        return view('cart');
    });

    Route::get('/check-out', function() {
        return view('check-out');
    });
    
    Route::get('/create', function() {
        return view('create');
    });
    
    Route::get('/payment-info', function() {
        return view('payment-info');
    });

    Route::get('/terms', function() {
        return view('terms');
    });

    Route::get('/signup', function() {
        return view('signup');
    });

    
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
    ],
function() {
    
    Route::group(
        [
            'prefix' => 'api'
        ]
        ,function () {
            
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
            
            Route::prefix('langs')->namespace('Admin')->group(function() {
                Route::get('get', 'LangsController@get');
                Route::put('update', 'LangsController@update');
            });
        }
    );
});

Route::get('/subscribe', 'MainController@subscribeUser');
Route::post('/getCart', 'CartController@get');
Route::post('/createOrder', 'Admin\OrderController@create');
Route::post('/searchProduct', 'MainController@searchAjax');

// iframes
Route::get('/iframe/subscribe', function() {
    return view('iframes.subscribe');
});
