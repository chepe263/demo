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
Route::get('/', 'ShopController@index')->name('shop.index');
Route::get('product/{product}', 'ShopController@product')->name('shop.product');

//Route::group(['prefix' => '', 'as' => 'shop.'], function() {});

Route::get('/amado', function () {
    return view('layouts.front');
});
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('show', 'CartController@show')->name('show');
    Route::post('add/{product}', 'CartController@add')->name('add');
    Route::post('remove/{cart_item}', 'CartController@remove')->name('remove');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function() {
    Route::get('show', 'CheckoutController@show')->name('show');
    Route::post('submit', 'CheckoutController@submit')->name('submit');
});

