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

Route::get('/', 'WebController@index')->name('index');
Route::get('/shops', 'WebController@shops')->name('shops');
Route::get('/shops/{shop}', 'WebController@showShop')->name('shops.show');
Route::get('/favorites', 'WebController@favorites')->name('favorites');
Route::get('/nearby', 'WebController@nearby')->name('nearby');