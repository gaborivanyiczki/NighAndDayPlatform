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
Route::get('/fetch-products-brand', 'BrandController@fetchBrandProducts')->name('brand.fetchbrandproducts');
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


//DASHBOARD
Route::get('/system/dashboard', 'DashboardController@home')->name('dashboard.home');
Route::get('/system/dashboard/settings', 'DashboardController@settings')->name('dashboard.settings');
Route::get('/system/dashboard/settings/edit/{id}', 'DashboardController@editSettings')->name('dashboard.settings.edit');
Route::post('/system/dashboard/settings/update', 'DashboardController@updateSettings')->name('dashboard.settings.update');

//DASHBOARD//PRODUCTS
Route::get('/system/dashboard/products', 'Dashboard\ProductController@index')->name('dashboard.products');
Route::get('/system/dashboard/products/show', 'Dashboard\ProductController@show')->name('dashboard.product.show');
//Route::get('/system/dashboard/products/create', 'Dashboard\ProductController@create')->name('dashboard.product.create');
Route::post('/system/dashboard/products/store', 'Dashboard\ProductController@store')->name('dashboard.product.store');
Route::get('/system/dashboard/products/edit/{id}', 'Dashboard\ProductController@edit')->name('dashboard.product.edit');
Route::post('/system/dashboard/products/update', 'Dashboard\ProductController@update')->name('dashboard.product.update');
Route::post('/system/dashboard/products/updateAttributeGroup', 'Dashboard\ProductController@updateAttributeGroup')->name('dashboard.product.updateAttributeGroup');
Route::post('/system/dashboard/products/addAttributes', 'Dashboard\ProductController@addAttributes')->name('dashboard.product.addAttributes');
Route::post('/system/dashboard/products/delete', 'Dashboard\ProductController@destroy')->name('dashboard.product.destroy');
Route::get('/system/dashboard/products/deleteAttribute/{id}/{productId}', 'Dashboard\ProductController@deleteAttribute')->name('dashboard.product.deleteAttribute');
Route::post('/system/dashboard/products/updateProductAttribute', 'Dashboard\ProductController@updateProductAttribute')->name('dashboard.product.updateProductAttribute');
Route::post('/system/dashboard/products/addProductImage', 'Dashboard\ProductController@addProductImage')->name('dashboard.product.addProductImage');
Route::get('/system/dashboard/products/deleteImage/{filename}', 'Dashboard\ProductController@deleteImage')->name('dashboard.product.deleteImage');

Wizard::routes('/system/dashboard/products/create', 'ProductWizardController', 'wizard.product');


//DASHBOARD//ATTRIBUTES
Route::get('/system/dashboard/attributes/get', 'Dashboard\AttributeController@getAttributes')->name('dashboard.attributes.get');
Route::get('/system/dashboard/attributes/getValues', 'Dashboard\AttributeController@getAttributeValues')->name('dashboard.attributes.getValues');
Route::get('/system/dashboard/attributes', 'Dashboard\AttributeController@index')->name('dashboard.attributes');
Route::get('/system/dashboard/attributes/values', 'Dashboard\AttributeController@attributeValues')->name('dashboard.attributes.values');
Route::get('/system/dashboard/attributes/groups', 'Dashboard\AttributeController@attributeGroups')->name('dashboard.attributes.groups');
 //attributes
Route::get('/system/dashboard/attributes/create', 'Dashboard\AttributeController@create')->name('dashboard.attributes.create');
Route::post('/system/dashboard/attributes/store', 'Dashboard\AttributeController@store')->name('dashboard.attributes.store');
Route::get('/system/dashboard/attributes/edit/{id}', 'Dashboard\AttributeController@edit')->name('dashboard.attributes.edit');
Route::post('/system/dashboard/attributes/update', 'Dashboard\AttributeController@update')->name('dashboard.attributes.update');
Route::post('/system/dashboard/attributes/delete', 'Dashboard\AttributeController@destroy')->name('dashboard.attributes.destroy');
 //attribute values
Route::get('/system/dashboard/attributes/values/create', 'Dashboard\AttributeController@attributeValuesCreate')->name('dashboard.attributes.values.create');
Route::post('/system/dashboard/attributes/values/store', 'Dashboard\AttributeController@attributeValueStore')->name('dashboard.attributes.values.store');
Route::get('/system/dashboard/attributes/values/edit/{id}', 'Dashboard\AttributeController@attributeValuesEdit')->name('dashboard.attributes.values.edit');
Route::post('/system/dashboard/attributes/values/update', 'Dashboard\AttributeController@attributeValuesUpdate')->name('dashboard.attributes.values.update');
Route::post('/system/dashboard/attributes/values/delete', 'Dashboard\AttributeController@attributeValuesDestroy')->name('dashboard.attributes.values.destroy');
 //groups
Route::get('/system/dashboard/attributes/groups/create', 'Dashboard\AttributeController@attributeGroupsCreate')->name('dashboard.attributes.groups.create');
Route::post('/system/dashboard/attributes/groups/store', 'Dashboard\AttributeController@attributeGroupsStore')->name('dashboard.attributes.groups.store');
Route::get('/system/dashboard/attributes/groups/edit/{id}', 'Dashboard\AttributeController@attributeGroupsEdit')->name('dashboard.attributes.groups.edit');
Route::post('/system/dashboard/attributes/groups/update', 'Dashboard\AttributeController@attributeGroupsUpdate')->name('dashboard.attributes.groups.update');
Route::post('/system/dashboard/attributes/groups/delete', 'Dashboard\AttributeController@attributeGroupsDestroy')->name('dashboard.attributes.groups.destroy');

//DASHBOARD//CATEGORIES
Route::get('/system/dashboard/categories', 'Dashboard\CategoryController@index')->name('dashboard.categories');
Route::get('/system/dashboard/categories/show', 'Dashboard\CategoryController@show')->name('dashboard.categories.show');
Route::get('/system/dashboard/categories/create', 'Dashboard\CategoryController@create')->name('dashboard.categories.create');
Route::post('/system/dashboard/categories/store', 'Dashboard\CategoryController@store')->name('dashboard.categories.store');
Route::get('/system/dashboard/categories/edit/{id}', 'Dashboard\CategoryController@edit')->name('dashboard.categories.edit');
Route::post('/system/dashboard/categories/update', 'Dashboard\CategoryController@update')->name('dashboard.categories.update');
Route::post('/system/dashboard/categories/delete', 'Dashboard\CategoryController@delete')->name('dashboard.categories.delete');

//DASHBOARD//BRANDS
Route::get('/system/dashboard/brands', 'Dashboard\BrandsController@index')->name('dashboard.brands');
Route::get('/system/dashboard/brands/show', 'Dashboard\BrandsController@show')->name('dashboard.brands.show');
Route::get('/system/dashboard/brands/create', 'Dashboard\BrandsController@create')->name('dashboard.brands.create');
Route::post('/system/dashboard/brands/store', 'Dashboard\BrandsController@store')->name('dashboard.brands.store');
Route::get('/system/dashboard/brands/edit/{id}', 'Dashboard\BrandsController@edit')->name('dashboard.brands.edit');
Route::post('/system/dashboard/brands/update', 'Dashboard\BrandsController@update')->name('dashboard.brands.update');
Route::get('/system/dashboard/brands/delete/{id}', 'Dashboard\BrandsController@delete')->name('dashboard.brands.delete');

//DASHBOARD//ORDERS
Route::get('/system/dashboard/orders/getProducts', 'Dashboard\OrderController@getProducts')->name('dashboard.orders.getProducts');
Route::get('/system/dashboard/orders/getProductPrice', 'Dashboard\OrderController@getProductPrice')->name('dashboard.orders.getProductPrice');
Route::get('/system/dashboard/orders', 'Dashboard\OrderController@index')->name('dashboard.orders');
Route::get('/system/dashboard/orders/invoices', 'Dashboard\OrderController@invoices')->name('dashboard.orders.invoices');
Route::get('/system/dashboard/orders/archived', 'Dashboard\OrderController@archived')->name('dashboard.orders.archived');
Route::get('/system/dashboard/orders/create', 'Dashboard\OrderController@create')->name('dashboard.orders.create');
Route::post('/system/dashboard/orders/store', 'Dashboard\OrderController@store')->name('dashboard.orders.store');
Route::get('/system/dashboard/orders/edit/{id}', 'Dashboard\OrderController@edit')->name('dashboard.orders.edit');
Route::post('/system/dashboard/orders/update', 'Dashboard\OrderController@update')->name('dashboard.orders.update');
Route::get('/system/dashboard/orders/show/{id}', 'Dashboard\OrderController@show')->name('dashboard.orders.show');
Route::get('/system/dashboard/orders/archive/{id}', 'Dashboard\OrderController@archive')->name('dashboard.orders.archive');
Route::get('/system/dashboard/orders/generateInvoice/{id}', 'Dashboard\OrderController@generateInvoice')->name('dashboard.orders.generateInvoice');

//DASHBOARD//VOUCHERS
Route::get('/system/dashboard/vouchers', 'Dashboard\VouchersController@index')->name('dashboard.vouchers');
Route::get('/system/dashboard/vouchers/create', 'Dashboard\VouchersController@create')->name('dashboard.vouchers.create');
Route::post('/system/dashboard/vouchers/store', 'Dashboard\VouchersController@store')->name('dashboard.vouchers.store');
Route::get('/system/dashboard/vouchers/edit/{id}', 'Dashboard\VouchersController@edit')->name('dashboard.vouchers.edit');
Route::post('/system/dashboard/vouchers/update', 'Dashboard\VouchersController@update')->name('dashboard.vouchers.update');
Route::post('/system/dashboard/vouchers/delete/{id}', 'Dashboard\VouchersController@destroy')->name('dashboard.vouchers.destroy');

//DASHBOARD//USER-MANAGEMENT
Route::get('/system/dashboard/user/profile', 'Dashboard\UsersController@profile')->name('dashboard.user.profile');
Route::post('/system/dashboard/user/resetPassword', 'Dashboard\UsersController@resetPassword')->name('dashboard.user.reset.password');
Route::post('/system/dashboard/user/updateProfile', 'Dashboard\UsersController@updateProfile')->name('dashboard.user.update.profile');
Route::get('/system/dashboard/users', 'Dashboard\UsersController@index')->name('dashboard.users');
Route::get('/system/dashboard/users/edit/{id}', 'Dashboard\UsersController@edit')->name('dashboard.users.edit');
Route::post('/system/dashboard/users/update', 'Dashboard\UsersController@update')->name('dashboard.users.update');
Route::post('/system/dashboard/users/delete', 'Dashboard\UsersController@destroy')->name('dashboard.users.destroy');
Route::get('/system/dashboard/users/getUserAddress', 'Dashboard\UsersController@getUserAddress')->name('dashboard.users.getUserAddress');

//DASHBOARD//FAQ
Route::get('/system/dashboard/faq', 'Dashboard\FaqController@index')->name('dashboard.faq');
Route::get('/system/dashboard/faq/create', 'Dashboard\FaqController@create')->name('dashboard.faq.create');
Route::post('/system/dashboard/faq/store', 'Dashboard\FaqController@store')->name('dashboard.faq.store');
Route::get('/system/dashboard/faq/edit/{id}', 'Dashboard\FaqController@edit')->name('dashboard.faq.edit');
Route::post('/system/dashboard/faq/update', 'Dashboard\FaqController@update')->name('dashboard.faq.update');
Route::post('/system/dashboard/faq/delete', 'Dashboard\FaqController@destroy')->name('dashboard.faq.destroy');
