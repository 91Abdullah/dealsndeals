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

    //image uploading routes
    Route::post('product/upload', ['as' => 'product.upload', 'uses' => 'ProductsController@upload']);
    Route::get('product/images/{id}', ['as' => 'product.image', 'uses' => 'ProductsController@image']);
    Route::get('product/images/success/{id}', ['as' => 'image.success', 'uses' => 'ProductsController@success']);

    //Category routes
    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('category/view/{id}', ['as' => 'category.view', 'uses' => 'CategoryController@view']);
    Route::post('category', ['as' => 'category.save', 'uses' => 'CategoryController@save']);
    Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
    Route::get('category/edit/{id}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::patch('category/update/{id}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
    Route::get('category/delete/{id}', ['as' => 'category.delete', 'uses' => 'CategoryController@delete']);
});

