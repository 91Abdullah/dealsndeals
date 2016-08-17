<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'namespace' => 'Admin'], function() {


    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

    //Product routes
    Route::get('product', ['as' => 'product.index', 'uses' => 'ProductsController@index']);
    Route::post('product', ['as' => 'product.save', 'uses' => 'ProductsController@save']);
    Route::get('product/new', ['as' => 'product.new', 'uses' => 'ProductsController@create']);
    Route::get('product/edit/{id}', ['as' => 'product.edit', 'uses' => 'ProductsController@edit']);
    Route::patch('product/update/{id}', ['as' => 'product.update', 'uses' => 'ProductsController@update']);
    Route::get('product/delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductsController@delete']);

    //Customer routes
    Route::get('customer', ['as' => 'customer.index', 'uses' => 'CustomerController@index']);
    Route::post('customer', ['as' => 'customer.save', 'uses' => 'CustomerController@save']);
    Route::get('customer/create', ['as' => 'customer.create', 'uses' => 'CustomerController@create']);
    Route::get('customer/edit/{id}', ['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
    Route::patch('customer/update/{id}', ['as' => 'customer.update', 'uses' => 'CustomerController@update']);
    Route::get('customer/delete/{id}', ['as' => 'customer.delete', 'uses' => 'CustomerController@delete']);
    Route::get('customer/view/{id}', ['as' => 'customer.view', 'uses' => 'CustomerController@view']);

    //Order routes
    Route::get('order', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    Route::post('order', ['as' => 'order.save', 'uses' => 'OrderController@save']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'OrderController@create']);
    Route::get('order/edit/{id}', ['as' => 'order.edit', 'uses' => 'OrderController@edit']);
    Route::patch('order/update/{id}', ['as' => 'order.update', 'uses' => 'OrderController@update']);
    Route::get('order/delete/{id}', ['as' => 'order.delete', 'uses' => 'OrderController@delete']);
    Route::get('order/view/{id}', ['as' => 'order.view', 'uses' => 'OrderController@view']);

    //Address routes
    Route::get('address', ['as' => 'address.index', 'uses' => 'AddressController@index']);
    Route::post('address', ['as' => 'address.save', 'uses' => 'AddressController@save']);
    Route::get('address/create', ['as' => 'address.create', 'uses' => 'AddressController@create']);
    Route::get('address/edit/{id}', ['as' => 'address.edit', 'uses' => 'AddressController@edit']);
    Route::patch('address/update/{id}', ['as' => 'address.update', 'uses' => 'AddressController@update']);
    Route::get('address/delete/{id}', ['as' => 'address.delete', 'uses' => 'AddressController@delete']);
    Route::get('address/view/{id}', ['as' => 'address.view', 'uses' => 'AddressController@view']);

    //image uploading routes
    Route::post('image/upload', ['as' => 'product.upload', 'uses' => 'ImageController@upload']);
    Route::get('images/product/{id}', ['as' => 'product.image', 'uses' => 'ImageController@index']);
    Route::get('images/delete', ['as' => 'image.delete', 'uses' => 'ImageController@delete']);
    Route::get('images/cover', ['as' => 'image.cover', 'uses' => 'ImageController@setCover']);

    //Category routes
    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('category/view/{id}', ['as' => 'category.view', 'uses' => 'CategoryController@view']);
    Route::post('category', ['as' => 'category.save', 'uses' => 'CategoryController@save']);
    Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
    Route::get('category/edit/{id}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::patch('category/update/{id}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
    Route::get('category/delete/{id}', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
});

