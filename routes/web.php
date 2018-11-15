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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('user', [
    'uses' => 'AuthController@store'
]);

Route::post('user/signin', [
    'uses' => 'AuthController@signin'
]);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/test', 'TestController@testMiddleware');
    Route::get('/logout', 'AuthController@logout');

});

