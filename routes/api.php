<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\API')->group(function() {
    Route::get('data', 'DataController@getData');
    Route::post('data', 'DataController@postData');

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');

    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

    Route::prefix('driver')->group(function() {
        Route::match(['GET','POST'], 'create', 'DriverController@create');
        Route::get('list', 'DriverController@list');
        Route::get('request', 'DriverController@request');
        Route::get('ondelivery', 'DriverController@ondelivery');
        Route::get('delete', 'DriverController@delete');
    });
});
