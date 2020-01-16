<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here where you can find:
| Home page
| Items page for each category
| Product page
| Search page
| Account "Settings" page
*/


Route::get('/', 'MainController@index')->name('home');

Route::get('/itemsPage/{category_id}','MainController@itemsPage')->name('itemsPage');

Route::get('/product/{item_id}','MainController@product')->name('productPage');

Route::get('/search','MainController@search')->name('search');

Route::get('/settings','MainController@settings')->name('settings');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here where you can find:
| Admin dashboard page
| Routes for CRUD "controlling categories.
| Routes for CRUD "controlling Menu items.
|
*/


Route::get('/admin','MainController@dashboard')->name('admin');

Route::resource('categories', 'CategoryController');

Route::resource('menu', 'MenuController');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
|
| Here where you can find:
| Add to cart
| Show cart page
| Order Received page
| Review Order page
| Cancel Order page
| Remove item from cart
| Reduce item's quantity by one
| increase item's quantity by one
|
*/

Route::post('/addToCart/{product}','CartController@addToCart')->name('cart.add');

Route::get('/shoppingCart','CartController@showCart')->name('cart.show');

Route::get('/orderReceived','CartController@orderReceived')->name('orderReceived');

Route::get('/reviewOrder','CartController@reviewOrder')->name('reviewOrder');

Route::get('/cancelOrder','CartController@cancelOrder')->name('cancelOrder');

Route::delete('/product/{product_id}','CartController@destroy')->name('product.remove');

Route::get('/reduce/{product_id}','CartController@reduceByOne')->name('product.reduceByOne');

Route::get('/increase/{product_id}','CartController@increaseByOne')->name('product.increaseByOne');

/*
|--------------------------------------------------------------------------
| Edit Cart Routes
|--------------------------------------------------------------------------
|
| Here where you can find:
| Add item to edited cart
| Show edited cart page
| Order Received page for edited order
| Review edited order page
| Remove item from edited cart
| Reduce item's quantity by one 'from edited cart'
| Increase item's quantity by one 'from edited cart'
|
*/

Route::post('/addToEditCart/{product}','EditCartController@addToEditCart')->name('EditCart.add');

Route::get('/EditShoppingCart','EditCartController@showCart')->name('editCart.show');

Route::get('/editOrderReceived','EditCartController@editOrderReceived')->name('editOrderReceived');

Route::get('/editReviewOrder','EditCartController@editReviewOrder')->name('editReviewOrder');

Route::delete('/editCartProduct/{product_id}','EditCartController@destroy')->name('EditProduct.remove');

Route::get('/editCartReduce/{product_id}','EditCartController@reduceByOne')->name('EditProduct.reduceByOne');

Route::get('/editCartIncrease/{product_id}','EditCartController@increaseByOne')->name('EditProduct.increaseByOne');





//|--------------------------------------------------------------------------
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
