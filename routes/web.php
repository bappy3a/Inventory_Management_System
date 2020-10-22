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

Route::get('/', 'pagesController@index')->name('index');

//Products Route
Route::group(['prefix' => 'products'], function(){

	Route::get('/', 'productsController@create')->name('products.add');
	Route::post('/store', 'productsController@store')->name('products.store');
	Route::get('/list', 'productsController@show')->name('products.list');
	Route::get('/edit/{id}', 'productsController@edit')->name('products.edit');
	Route::post('/delete/{id}', 'productsController@delete')->name('products.delete');
	Route::post('/update/{id}', 'productsController@update')->name('products.update');
	Route::get('/stock', 'productsController@stock')->name('products.stock');

   //Production Entry
	Route::get('/production_entry', 'productsController@production_entry')->name('products.production.entry');
	Route::post('/production_entry', 'productsController@production_add')->name('products.production.add');


});

//crm Route

Route::group(['prefix' => 'crm'], function(){

	//Clients Route
	Route::get('/client', 'crmController@client_create')->name('crm.client.add');
	Route::post('/client/store', 'crmController@client_store')->name('crm.client.store');
	Route::get('/client/list', 'crmController@client_show')->name('crm.client.list');
	Route::get('/client/edit/{id}', 'crmController@client_edit')->name('crm.client.edit');
	Route::post('/client/update/{id}', 'crmController@client_update')->name('crm.client.update');
	Route::post('/client/delete/{id}', 'crmController@client_delete')->name('crm.client.delete');
//Suppliers Route
	Route::get('/supplier', 'crmController@supplier_create')->name('crm.supplier.add');
	Route::post('/supplier/store', 'crmController@supplier_store')->name('crm.supplier.store');
	Route::get('/supplier/list', 'crmController@supplier_show')->name('crm.supplier.list');
	Route::get('/supplier/edit/{id}', 'crmController@supplier_edit')->name('crm.supplier.edit');
	Route::post('/supplier/update/{id}', 'crmController@supplier_update')->name('crm.supplier.update');
	Route::post('/supplier/delete/{id}', 'crmController@supplier_delete')->name('crm.supplier.delete');

});

//Sales route

Route::group(['prefix' => 'sales'], function(){

	Route::get('/new_invoice', 'salescontroller@index')->name('sale.newinvoice');
	Route::post('/new_invoice/store', 'salescontroller@store')->name('sale.newinvoice.store');
	Route::get('/invoice_list', 'salescontroller@invoice_list')->name('sale.invoice_list');
	Route::get('/invoice/{id}', 'salescontroller@invoice')->name('invoice');
	Route::post('invoice/delete/{id}', 'salescontroller@delete')->name('invoice.delete');

	//Due Report
	Route::get('/invoice_due', 'salescontroller@invoice_due')->name('sale.invoice.due');
	Route::get('/invoice_due_Customer_wise', 'salescontroller@invoice_due_Customer_wise')->name('sale.invoice.due.customer');
	Route::get('/invoice_due_Customer_wise/search', 'salescontroller@search_due_report')->name('sale.invoice.due.customer.search');

	//Sales Report

	Route::get('/daily_sale', 'salescontroller@daily_sale')->name('sale.daily_sale');
	Route::get('/daily_sale_search', 'salescontroller@daily_sale_search')->name('sale.daily_sale.search');

	//sale report customer
	Route::get('/daily_sale_by_customer', 'salescontroller@daily_sale_customer')->name('sale.daily_sale.customer');
	Route::get('/daily_sale_by_customer_search', 'salescontroller@daily_sale_customer_search')->name('sale.daily_sale.customer.search');
	
	//sale report product
	Route::get('/daily_sale_by_product', 'salescontroller@daily_sale_product')->name('sale.daily_sale.product');
	Route::get('/daily_sale_by_product_search', 'salescontroller@daily_sale_product_search')->name('sale.daily_sale.product.search');

});

//Setting Route

Route::group(['prefix' => 'setting'], function(){

	Route::group(['prefix' => 'user'], function(){

		Route::get('/user_list', 'UserPermissionController@index')->name('permission.userlist');
		Route::get('/permission/{id}', 'UserPermissionController@permission')->name('permission');
		Route::post('/permission/update/{id}', 'UserPermissionController@permission_update')->name('permission.update');
		
	});
	
});

//Office_purchase Route

Route::group(['prefix' => 'office_purchase'], function(){
	
		Route::get('/entry', 'PurchaseController@index')->name('purchase.entry');
	
});




//API routes
//Create Invoice...
Route::get('get-client/{id}', function($id){

	return json_encode(App\Models\CrmClient::where('id', $id)->get());
});
Route::get('get-product/{id}', function($id){

	return json_encode(App\Models\Product::where('id', $id)->get());
});


//Login Routes......
//Auth::routes();

Route::get('/home', 'pagesController@index')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//Password reset routes...

/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');*/


