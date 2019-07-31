<?php

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'HomeController@index');


Route::prefix('products')->group(function () {

    Route::apiresource('product', 'ProductController');
    // Route::post('login', 'Userauth\UserapiauthController@login');
  });

  Route::prefix('authadmin')->group(function () {
    Route::post('login', 'AdminController@login');
    Route::post('signup', 'AdminController@signup');
    Route::post('admin', 'AdminController@admin');
    Route::post('adminpassword', 'AdminController@resetadminpassword');
    // Route::post('login', 'Userauth\UserapiauthController@login');
  });

  Route::prefix('authuser')->group(function () {
    Route::post('login', 'UserController@login');
    Route::post('signup', 'UserController@signup');
    Route::post('user', 'UserController@user');
    Route::post('userpassword', 'UserController@resetuserpassword');
    Route::post('usernumber', 'UserController@updateusernumber');
    Route::post('useremail', 'UserController@updateuseremail');
    // Route::post('login', 'Userauth\UserapiauthController@login');
  });


  Route::prefix('authsuper')->group(function () {
    Route::apiresource('super', 'SuperController');
  });

  Route::prefix('superrestrict')->group(function () {
    Route::post('deleteuser', 'SupercontrolController@deleteuser');
    Route::post('deleteadmin', 'SupercontrolController@deleteadmin');
    Route::post('disableadmin', 'SupercontrolController@disableadmin');
    Route::post('disableuser', 'SupercontrolController@disableuser');
    Route::get('getalladmin', 'SupercontrolController@getalladmin');
    Route::get('getalluser', 'SupercontrolController@getalluser');
    Route::post('loginsuper', 'SupercontrolController@loginsuper');
  });


  Route::prefix('misc')->group(function () {

    Route::get('pc/{category}', 'miscilleniousController@categoryproducts');
        Route::get('suggestproduct/{category}', 'miscilleniousController@suggestproduct');
            Route::get('suggestmany/{category}', 'miscilleniousController@suggestmany');
    // Route::post('login', 'Userauth\UserapiauthController@login');
  });

  Route::apiresource('category', 'CategoryController');
  Route::apiresource('banner', 'bannerController');

  Route::prefix('ordersinfo')->group(function () {

    Route::post('placeorder', 'OrderController@placeorder');
    Route::post('getalluserorder', 'OrderController@getalluserorder');
    Route::post('getalladminorder', 'OrderController@getalladminorder');
    Route::post('getalladminproducts', 'OrderController@getalladminproducts');


    // Route::post('login', 'Userauth\UserapiauthController@login');
  });
