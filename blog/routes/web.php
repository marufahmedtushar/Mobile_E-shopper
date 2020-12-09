<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth','admin']],function() {

Route::get('/dashboard','AdminController@dashboard');

Route::get('/users','AdminController@users');
Route::put('/userroleupdate','AdminController@userroleupdate');
Route::delete('/deleteuser/{id}','AdminController@userdelete');


Route::get('/categories','AdminController@categories');
Route::put('/catstore','AdminController@catstore');
Route::put('/catupdate','AdminController@updatecat');

Route::get('/products','AdminController@products');
Route::get('/addproducts','AdminController@addproducts');
Route::put('/productstore','AdminController@productstore');
Route::get('/viewproduct/{id}','AdminController@productdetails');
Route::get('/editproduct/{id}','AdminController@productedit');
Route::put('/updateproduct/{profucts}','AdminController@productupdate');
Route::delete('/deleteproduct/{id}','AdminController@productdelete');


Route::get('/setting','AdminController@setting');
Route::put('/storecost','AdminController@shippingcoststore');


Route::put('/storepayment','AdminController@paymenttypestore');


Route::get('/orders','AdminController@orders');
});


Route::group(['middleware' => ['auth','user']],function() {
Route::get('/userprofile','IndexController@userprofile');
Route::put('/userinfosave/{id}','IndexController@userinfosave');


Route::put('/storecart','IndexController@cartstore');
Route::get('/cart','IndexController@cart');
Route::put('/cartupdate/{id}','IndexController@updatecart');
Route::delete('/cartdelete/{id}','IndexController@deletecart');


Route::get('/checkout','IndexController@checkout');
Route::put('/storecheckout','IndexController@checkoutstore');

Route::put('/rating/{product}','IndexController@ratingstore');
});

Auth::routes();

Route::get('/', 'IndexController@index');
Route::get('/categorydetails/{id}', 'IndexController@categorydetails');
Route::get('/productdetails/{id}', 'IndexController@productdetails');
