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

	//request order
	Route::get('request-order','RequestOrderController@index');
	Route::get('request-order/create','RequestOrderController@create');
	Route::post('request-order/save','RequestOrderController@save');
	Route::get('request-order/show/{id}','RequestOrderController@show');
	Route::get('request-order/edit/{id}','RequestOrderController@edit');
	Route::put('request-order/update/{id}','RequestOrderController@update');
	Route::delete('request-order/delete/{id}','RequestOrderController@delete');
	Route::get('request-order/sub/delete/{id}','RequestOrderController@delete_sub');
	Route::post('request-order/sub/save','RequestOrderController@save_sub');
	Route::get('request-order/detail/{id}','RequestOrderController@detail');

	//purchase order
	Route::get('purchase-order','PurchaseOrderController@index');
	Route::get('purchase-order/create','PurchaseOrderController@create');
	Route::post('purchase-order/save','PurchaseOrderController@save');
	Route::get('purchase-order/show/{id}','PurchaseOrderController@show');
	Route::get('purchase-order/edit/{id}','PurchaseOrderController@edit');
	Route::put('purchase-order/update/{id}','PurchaseOrderController@update');
	Route::delete('purchase-order/delete/{id}','PurchaseOrderController@delete');
	Route::get('purchase-order/sub/delete/{id}','PurchaseOrderController@delete_sub');
	Route::post('purchase-order/sub/save','PurchaseOrderController@save_sub');
	Route::get('purchase-order/detail/{id}','PurchaseOrderController@detail');


	//purchase order
	Route::get('delivery-order','DeliveryOrderController@index');
	Route::get('delivery-order/create','DeliveryOrderController@create');
	Route::post('delivery-order/save','DeliveryOrderController@save');
	Route::get('delivery-order/show/{id}','DeliveryOrderController@show');
	Route::get('delivery-order/edit/{id}','DeliveryOrderController@edit');
	Route::put('delivery-order/update/{id}','DeliveryOrderController@update');
	Route::delete('delivery-order/delete/{id}','DeliveryOrderController@delete');
	Route::get('delivery-order/sub/delete/{id}','DeliveryOrderController@delete_sub');
	Route::post('delivery-order/sub/save','DeliveryOrderController@save_sub');

	//Stock
	Route::get('stock','StockController@index');

	//Report
	Route::get('report/stock','ReportController@stock');
	Route::post('report/stock','ReportController@doStock');
	Route::get('report/request-order','ReportController@requestOrder');
	Route::post('report/request-order','ReportController@doRequestOrder');
	Route::get('report/purchase-order','ReportController@purchaseOrder');
	Route::post('report/purchase-order','ReportController@doPurchaseOrder');
	Route::get('report/delivery-order','ReportController@deliveryOrder');
	Route::post('report/delivery-order','ReportController@doDeliveryOrder');
});

Route::auth();

