<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','Auth\AuthController@showLoginForm');

Route::group(['middleware'=>['auth']],function(){
	Route::get('home','HomeController@index');

	//User
	Route::get('user','UserController@index');
	Route::get('user/create','UserController@create');
	Route::post('user/save','UserController@save');
	Route::get('user/edit/{id}/{name}','UserController@edit');
	Route::put('user/update/{id}','UserController@update');
	Route::delete('user/delete/{id}','UserController@delete');

	//Category
	Route::get('category','CategoryController@index');
	Route::get('category/create','CategoryController@create');
	Route::post('category/save','CategoryController@save');
	Route::get('category/edit/{id}/{name}','CategoryController@edit');
	Route::put('category/update/{id}','CategoryController@update');
	Route::delete('category/delete/{id}','CategoryController@delete');
	Route::get('category/sub/delete/{id}','CategoryController@delete_sub');
	Route::post('category/sub/save','CategoryController@save_sub');

	//vendor
	Route::get('vendor','VendorController@index');
	Route::get('vendor/create','VendorController@create');
	Route::post('vendor/save','VendorController@save');
	Route::get('vendor/edit/{id}/{name}','VendorController@edit');
	Route::put('vendor/update/{id}','VendorController@update');
	Route::delete('vendor/delete/{id}','VendorController@delete');

	//department
	Route::get('department','DepartmentController@index');
	Route::get('department/create','DepartmentController@create');
	Route::post('department/save','DepartmentController@save');
	Route::get('department/edit/{id}/{name}','DepartmentController@edit');
	Route::put('department/update/{id}','DepartmentController@update');
	Route::delete('department/delete/{id}','DepartmentController@delete');

	//product
	Route::get('product','ProductController@index');
	Route::get('product/create','ProductController@create');
	Route::post('product/save','ProductController@save');
	Route::get('product/edit/{id}/{name}','ProductController@edit');
	Route::put('product/update/{id}','ProductController@update');
	Route::delete('product/delete/{id}','ProductController@delete');
	
});

Route::auth();

