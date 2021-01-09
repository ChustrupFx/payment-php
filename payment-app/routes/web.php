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

Route::get('/', 'HomeController@show')->name('home.show');

Route::get('/product/{slug}', 'ProductController@show')->name('product.show');

Route::delete('/cart/remove/{id}', 'ShoppingCartController@deleteItem')->name('shoppingcart.deleteItem');
Route::post('/cart/add/{id}', 'ShoppingCartController@store')->name('shoppingcart.store');
Route::get('/cart/', 'ShoppingCartController@show')->name('shoppingcart.show');

Route::get('/login', 'UserController@loginShow')->name('login.show');
Route::post('/login', 'UserController@login')->name('login.do');

Route::get('/checkout', 'CheckoutController@show')->name('checkout.show');


