<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->namespace('Auth')->group(function ($router) {
    Route::middleware('api')->group(function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
    });
});

Route::middleware('auth:api')->group(function () {
    Route::post('posts', 'PostsController@store')->middleware('permission: create posts');
    Route::get('posts', 'PostsController@index')->middleware('permission:show posts');
});
