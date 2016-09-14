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

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [
            'as' => 'category.index',
            'uses' => 'CategoryController@index'
        ]);

        Route::get('edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit'
        ]);

        Route::put('update/{id}', [
            'as' => 'category.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('create', [
            'as' => 'category.create',
            'uses' => 'CategoryController@create'
        ]);

        Route::post('store', [
            'as' => 'category.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('destroy/{id}', [
            'as' => 'category.destroy',
            'uses' => 'CategoryController@destroy'
        ]);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'ProductController@index'
        ]);

        Route::get('create', [
            'as' => 'product.create',
            'uses' => 'ProductController@create'
        ]);

        Route::post('store', [
            'as' => 'product.store',
            'uses' => 'ProductController@store'
        ]);

        Route::get('edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'ProductController@edit'
        ]);

        Route::put('update/{id}', [
            'as' => 'product.update',
            'uses' => 'ProductController@update'
        ]);

        Route::get('destroy/{id}', [
            'as' => 'product.destroy',
            'uses' => 'ProductController@destroy'
        ]);
    });

});

