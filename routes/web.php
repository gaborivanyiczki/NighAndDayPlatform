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

//Authentication
Auth::routes();
//////////////////      CUSTOM ROUTES   /////////////////////////////////////////
//Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about-us', 'HomeController@aboutUs')->name('about');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/faq', 'HomeController@faq')->name('faq');
//Contact
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactController@contactPost']);
//Product
Route::get('/product/{slug}', 'ProductController@details')->name('productdetails');
//Category
Route::get('/category/{slug}', 'CategoryController@products')->name('categoryproducts');
Route::get('/fetch-products', 'CategoryController@fetchProducts')->name('fetchproducts');
//Brand
Route::get('/brand/{slug}', 'BrandController@brandDetails')->name('brand.details');
//Cart
Route::get('/add-to-cart', 'CartController@addToCart')->name('addtocart');
Route::get('/cart/get', 'CartController@getCartContent')->name('getcart');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/remove-from-cart', 'CartController@removeItemFromCart')->name('removefromcart');
Route::get('/update-cart-qty', 'CartController@updateCartItemQuantity')->name('updatecartquantity');
//UserManagement
Route::get('/user/account', 'UserController@myaccount')->name('myaccount');
Route::get('/user/addresses', 'UserController@myaddresses')->name('myaddresses');
Route::get('/user/orders', 'UserController@myorders')->name('myorders');
Route::get('/user/vouchers', 'UserController@myvouchers')->name('myvouchers');
Route::get('/user/warranties', 'UserController@mywarranties')->name('mywarranties');
Route::get('/user/reviews', 'UserController@myreviews')->name('myreviews');
Route::get('/user/settings', 'UserController@settings')->name('user.settings');
Route::get('/user/subscriptions', 'UserController@mysubscriptions')->name('mysubscriptions');

Route::post('/user/postUserAddress', 'UserController@postUserAddress')->name('user.add.adress');
Route::post('/user/updateUserAddress', 'UserController@updateUserAddress')->name('user.edit.adress');
Route::post('/user/removeUserAddress', 'UserController@removeUserAddress')->name('removeUserAddress');
Route::get('/user/getUserAddress', 'UserController@getUserAddress')->name('getUserAddress');

Route::get('/user/getUserDetails', 'UserController@getUserDetails')->name('getUserDetails');
Route::post('/user/updateUserDetails', 'UserController@updateUserDetails')->name('user.edit.details');
Route::post('/user/resetPassword', 'UserController@resetPassword')->name('user.reset.password');
