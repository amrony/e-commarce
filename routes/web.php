<?php

Route::get('/', 'NewShopController@index')->name('/');
Route::get('/category-product/{id}', 'NewShopController@categoryProduct')->name('category-product');
Route::get('product/details/{id}', 'NewShopController@productDetails')->name('product-details');
Route::post('/cart/add', 'CartController@addToCart')->name('add-to-cart');
Route::get('/cart/show', 'CartController@showCart')->name('show-cart');
Route::get('/cart/delete/{id}', 'CartController@deleteCart')->name('delete-cart');
Route::post('/cart/update', 'CartController@updateCart')->name('update-cart');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/checkout/shipping', 'CheckoutController@shippingForm')->name('checkout-shipping');
Route::post('shipping/save', 'CheckoutController@saveShippingInfo')->name('new-shipping');
Route::get('/checkout/payment', 'CheckoutController@paymentForm')->name('checkout-payment');
Route::post('/checkout/order', 'CheckoutController@newOrder')->name('new-order');
Route::get('/complete/order', 'CheckoutController@completeOrder')->name('complete-order');


Route::post('/customer/registration', 'CheckoutController@customerSignUp')->name('customer-sign-up');
Route::get('/mail', 'NewShopController@mail')->name('mail');
Route::get('/category/add', 'CategoryController@index')->name('add-category');
Route::post('/category/save', 'CategoryController@saveCategory')->name('new-category');
Route::get('/category/manage', 'CategoryController@manageCategory')->name('manage-category');
Route::get('/category/edit/{id}', 'CategoryController@editCategory')->name('edit-category');
Route::post('/category/update', 'CategoryController@updateCategory')->name('update-category');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategory')->name('delete-category');
Route::get('/category/unpublished/{id}', 'CategoryController@unpublishedCategory')->name('unpublished-category');
Route::get('/category/published/{id}', 'CategoryController@publishedCategory')->name('published-category');
Route::get('/brand/add', 'BrandController@index')->name('add-brand');
Route::post('/brand/save', 'BrandController@saveBrand')->name('new-brand');
Route::get('/brand/manage', 'BrandController@manageBrand')->name('manage-brand');
Route::get('/brand/edit/{id}', 'BrandController@editBrand')->name('edit-brand');
Route::post('/brand/update', 'BrandController@updateBrand')->name('update-brand');
Route::get('/brand/delete/{id}', 'BrandController@deleteBrand')->name('delete-brand');
Route::get('/brand/unpublished/{id}', 'BrandController@unpublishedBrand')->name('unpublished-brand');
Route::get('/brand/published/{id}', 'BrandController@publishedBrand')->name('published-brand');
Route::get('/product/add', 'ProductController@index')->name('add-product');
Route::post('/product/save', 'ProductController@saveProduct')->name('new-product');
Route::get('/product/manage', 'ProductController@manageProduct')->name('manage-product');
Route::get('/product/view/{id}', 'ProductController@viewProduct')->name('view-product');
Route::get('/product/edit/{id}', 'ProductController@editProduct')->name('edit-product');
Route::post('/product/update', 'ProductController@updateProduct')->name('update-product');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct')->name('delete-product');
Route::get('/product/unpublished/{id}', 'ProductController@unpublishedProduct')->name('unpublished-product');
Route::get('/product/published/{id}', 'ProductController@publishedProduct')->name('published-product');
//Route::get('product-details/{id}', 'ProductController@productDetails')->name('product-details');


Route::resource('/test', 'TestController@');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
