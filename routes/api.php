<?php

Route::post('auth/login', 'AuthController@login');
Route::get('category/', 'CategoryController@index');
Route::get('category/{category}', 'CategoryController@products');
Route::get('category/{category}/tags', 'CategoryController@tags');
Route::get('products/', 'ProductController@index');
Route::get('products/{product}/tags', 'ProductController@tags');
Route::group(['middleware' => 'edit_roles', 'prefix' => 'manage'], function () {
    Route::apiResources([
        'category' => 'Manage\CategoryController',
        'product' => 'Manage\ProductController'
    ]);
});
Route::fallback(function () {
    return [
        'success' => false,
        'data' => 'Route not found',
    ];
});
