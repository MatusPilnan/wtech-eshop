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

Route::view('/admin', 'welcome');

Auth::routes();

Route::put('/cart/qty', 'OrderController@update');
Route::put('/cart/add', 'OrderController@addToCart');
Route::put('/cart/setDelivery', 'OrderController@setDelivery');
Route::put('/cart/setPayment', 'OrderController@setPayment');
Route::get('/cart', 'OrderController@show');
Route::post('/cart/remove', 'OrderController@removeFromCart');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/{product_id}/', 'ProductController@show');
Route::get('/product/{product_id}/get', 'ProductController@getProduct');
Route::get('/product/{product_id}/miniImg', 'ProductController@miniImg');
Route::get('/products/list', 'CategoryController@list');
Route::get('/products/miniImgs', 'ProductController@miniImgs');
Route::get('/order/delivery', 'OrderController@delivery');
Route::get('/order/payment', 'OrderController@payment');
Route::get('/order/summary', 'OrderController@summary');
Route::get('/order/fin', 'OrderController@fin')->middleware('auth');
Route::get('/manufacturers/list', 'ManufacturerController@list');
Route::post('/manufacturers/new', 'ManufacturerController@create');
Route::get('/subcategories/list', 'SubcategoryController@list');
Route::delete('/products/{product}', 'ProductController@destroy');
Route::post('/products', 'ProductController@create');
Route::get('/images/{product_id}', 'ImageController@images');
Route::get('/images/{product_id}/mini', 'ImageController@mini');
Route::get('/images/{product_id}/thumbnail', 'ImageController@thumbnail');
Route::delete('/images/{image}', 'ImageController@destroy');
Route::post('/images/upload', 'ImageController@upload');
Route::resource('categories', 'CategoryController');
Route::resource('/catalog/{subcategory_id}', 'SubcategoryController');
