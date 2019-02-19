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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('/');

// Route::get('/cart', 'CartController@index')->name('cart');
// Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/cart', 'CartController@getAddToCart')->name('carts.getAddToCart');
Route::get('/cart', 'CartController@getCart')->name('carts.shoppingCart');
Route::post('/saveCart', 'CartController@postCheckout')->name('carts.postCheckout');

