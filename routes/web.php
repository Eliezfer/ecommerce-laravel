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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('products', 'ProductController');

Route::resource('in_shopping_carts', 'ProductInShoppingCartController',[
    'only' => ['store', 'destroy']
]);

Route::get('/carrito', 'ShoppingCartController@show')->name('shopping_cart.show');
Route::get('/carrito/products', 'ShoppingCartController@products')->name('shopping_cart.products');

Route::get('/pay', 'PaymentsController@pay')->name('payments.pay');
Route::get('/pay/complete', 'PaymentsController@execute')->name('payments.execute');