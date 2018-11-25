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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::put('/cart/qty', 'OrderController@update');
Route::put('/cart/add', 'OrderController@addToCart');
Route::put('/cart/setDelivery', 'OrderController@setDelivery');
Route::put('/cart/setPayment', 'OrderController@setPayment');
Route::post('/cart/remove', 'OrderController@removeFromCart');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'OrderController@show');
Route::get('/product/{product_id}/', 'ProductController@show');
Route::get('/order/delivery', 'OrderController@delivery');
Route::get('/order/payment', 'OrderController@payment');
Route::get('/order/summary', 'OrderController@summary');
Route::get('/order/fin', 'OrderController@fin')->middleware('auth');
Route::resource('categories', 'CategoryController');
Route::resource('/catalog/{subcategory_id}', 'SubcategoryController');