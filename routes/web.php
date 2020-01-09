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

//Home Page
Route::get('/', 'MainController@index');

Route::get('/itemsPage','MainController@itemsPage');

Route::get('/itemsPage/{category_id}','MainController@itemsPage');
Route::get('/product/{item_id}','MainController@product');
Route::get('/admin','MainController@dashboard');

Route::resource('categories', 'CategoryController');
Route::resource('menu', 'MenuController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
