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

Route::get('/','HomeController@index')->name('index');
Route::get('/orders','Orders\OrderController@index')->name('orders.index');
Route::get('order/{product}/create','Orders\OrderController@create')->name('orders.create');
Route::post('order/{product}/create','Orders\OrderController@store')->name('orders.store');
Route::get('order/{order}','Orders\OrderController@show')->name('orders.show');
Route::get('order/{order}/retry','Orders\OrderController@retry')->name('orders.retry');