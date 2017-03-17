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
	
Route::get('/', function () {
    return [];
});

Route::post('/auth/local', function () {
	// return 'ss';
    return ['token'=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTQ4OTExODI3MiwiZXhwIjoxNDg5MTM2MjcyfQ.L2B9gQCd85HluIptVXm-eQrm0tjPx7QxOXC55THqAOg"];
});

Route::get('/users/me', function () {
    return [
	    '_id' => 2,
	  	'email'=> "admin@example.com",
	  	'name'=>'Admin',
	    'profile'=>[
	    	'name'=> "Admin", 
	    	'role'=> "admin"
		], 
		'token'=> [
			'_id'=> 2, 
			'role'=> "admin"
		], 
		'provider'=>"local",
		'role'=>"admin"
    ];
});

Route::get('/events', function () {
	// return 'ss';
    return [
		[
			'User'=> null,
			'UserId'=> null,
			'_id'=> 1,
			'allDay'=> false,
			'className'=> "green",
			'createdAt'=> "2017-03-09T 20:10:13.000Z",
			'description'=> "long description",
			'end'=> "2017-03-09T 20:10:20.000Z",
			'icon'=> "mdi-alert-warning",
			'start'=> "2017-03-09T 20:10:10.000Z",
			'title'=> "All Day Event",
			'interval'=>10,
			'updatedAt'=> "2017-03-09T 20:10:13.000Z",
		],
		[
			'User'=> null,
			'UserId'=> null,
			'_id'=> 1,
			'allDay'=> false,
			'className'=> "green",
			'createdAt'=> "2017-03-09T 20:10:13.000Z",
			'description'=> "long description",
			'end'=> "2017-03-09T 20:10:20.000Z",
			'icon'=> "mdi-alert-warning",
			'start'=> "2017-03-09T 20:10:10.000Z",
			'title'=> "All Day Event",
			'interval'=>15,
			'updatedAt'=> "2017-03-09T 20:10:13.000Z",
		],
		[
			'User'=> null,
			'UserId'=> null,
			'_id'=> 1,
			'allDay'=> false,
			'className'=> "green",
			'createdAt'=> "2017-03-09T 20:10:13.000Z",
			'description'=> "long description",
			'end'=> "2017-03-09T 20:10:20.000Z",
			'icon'=> "mdi-alert-warning",
			'start'=> "2017-03-09T 20:10:10.000Z",
			'title'=> "All Day Event",
			'interval'=>10,
			'updatedAt'=> "2017-03-09T 20:10:13.000Z",
		],
		[
			'User'=> null,
			'UserId'=> null,
			'_id'=> 1,
			'allDay'=> false,
			'className'=> "blue",
			'createdAt'=> "2017-03-09T 20:10:13.000Z",
			'description'=> "long description",
			'end'=> "2017-03-14",
			'icon'=> "mdi-alert-warning",
			'start'=> "2017-03-11",
			'title'=> "All Day Event",
			'interval'=>15,
			'updatedAt'=> "2017-03-09T 20:10:13.000Z",
		]
	];
});
// Route=>=>get('/welcome','HomeController@partialsWelcome');
// Route=>=>auth();

// Route=>=>get('/home', ['as'=>'home', 'uses'=>'HomeController@index']);
// Route=>=>get('/orders', 'OrdersController@setOrderId');
// Route=>=>get('/home/{id}', ['as' => 'home.showsubcat', 'uses' => 'HomeController@getSubcategory'] );
// Route=>=>get('/group/{id}', ['as' => 'home.showgroup', 'uses' => 'HomeController@getGroup'] );
// Route=>=>get('/products/{id}', ['as' => 'home.showproducts', 'uses' => 'HomeController@getProducts'] );

// Route=>=>get('/products/{id}/{product_id}', ['as' => 'home.showproductsdetail', 'uses' => 'HomeController@getProductsDetail'] );

// // Route=>=>get('/variations/{id}', ['as' => 'home.showvariations', 'uses' => 'HomeController@getVariations'] );

// Route=>=>post('/variations/getnextattr', ['as' => 'home.getnextattr', 'uses' => 'HomeController@getNextAttribute'] );
// Route=>=>post('/savevariation/{product_id}', ['as' => 'home.savevariation', 'uses' => 'HomeController@saveVariations'] );

// Route=>=>post('/saveorder', ['as' => 'home.saveorder', 'uses' => 'HomeController@saveOrder'] );
// Route=>=>get('/summary', function(){
//   return view('welcome');
// });
// Route=>=>get('summary/{order_id}', ['as'=>'summary.show_summary', 'uses'=>'OrdersController@show']);
// Route=>=>post('/search/{id_1}/{id_2}','OrdersController@searchOrders');
// Route=>=>get('/select-order/{id}',['as'=>'orders.selectorder', 'uses'=>'OrdersController@selectOrderId']);
// Route=>=>get('/session', 'HomeController@sessions');
// Route=>=>post('/search-customer/{v1}/{v2}/{v3}', 'OrdersController@findCustomer' );
// Route=>=>post('summary/addCustomer/{id1}/{id2}', 'OrdersController@addCustomerToOrder');
// Route=>=>post('summary/check_customer_present/{id1}', 'OrdersController@isCutomerInfoPresent');
// Route=>=>post('insert_customer_info', 'OrdersController@insertCustomerInfo');
// Route=>=>post('add_shipping_information', 'OrdersController@addShippingInformation');
// Route=>=>post('add_misc_items', 'OrdersController@addMiscItems');
// Route=>=>post('select_customer/{customer_id}/{company_id}', 'OrdersController@selectCustomer');
