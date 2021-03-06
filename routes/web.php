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

Auth::routes();
Route::get('/', function () {
    return redirect('/eshop_list');
});

Route::get('/home', 'EshopController@index')->name('home');

//back end
Route::group(['middleware' => ['auth']], function() {
    Route::get('/show_cat', 'CategoryController@index')->name('show_cat');
    Route::get('/add_cat', 'CategoryController@create')->name('add_cat');
    Route::post('/save_cat', 'CategoryController@store')->name('save_cat');

    Route::get('/show_prod', 'ProductController@index')->name('show_prod');
    Route::get('/add_prod', 'ProductController@create')->name('add_prod');
    Route::post('/save_prod', 'ProductController@store')->name('save_prod');

    Route::get('/show_orders', 'OrderController@index')->name('show_orders');
    Route::get('/admdashbd', 'AdminPanelController@index')->name('admdashbd');
    Route::get('/admlogout', 'AdminPanelController@logout')->name('admlogout');
});

Route::get('/adminregipage', 'AdminPanelController@adminRegisterPage')->name('adminregipage');
Route::post('/admregister', 'AdminPanelController@registerAdmin')->name('admregister');

Route::get('/adminloginpage', 'AdminPanelController@adminLoginPage')->name('adminloginpage');
Route::post('/admlogin', 'AdminPanelController@login')->name('admlogin');




//front end
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function() {
   
    Route::get('/eshop_list', 'EshopController@index')->name('eshop_list');

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/addcart', 'CartController@addToCart')->name('addcart');


    Route::get('/removecart/{pid}', 'CartController@removeFromCart')->name('removecart');
    
    Route::get('/placeOrder', 'CheckoutController@placeOrder')->name('placeOrder');

});




