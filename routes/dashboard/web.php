<?php 


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function ()
{
 
	Route::get('/index', 'DashboardController@index')->name('index');

	Route::resource('/users', 'UserController')->except(['show']);

	Route::resource('/categories', 'CategoryController')->except(['show']);

	Route::resource('/products', 'ProductController')->except(['show']);



}); //end of dashboard routs



