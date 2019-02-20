<?php 


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function ()
{
 
	Route::get('/index', 'DashboardController@index')->name('index');

	Route::resource('/users', 'UserController')->except(['show']);

	Route::resource('/categories', 'CategoryController')->except(['show']);

	Route::resource('/products', 'ProductController')->except(['show']);

	Route::get('/orders', 'UserOrderController@getAllUserOrder')->name('orders.all');
	Route::get('/orders/user', 'UserOrderController@getUserOrder')->name('orders.user');

	Route::resource('/orders', 'UserOrderController')->only(['destroy']);
	// Route::post('/products', 'ProductController@getAddToCart')->name('products.getAddToCart');
	// Route::post('/products', 'ProductController@getAddToCart')->name('products.getAddToCart');



}); //end of dashboard routs




