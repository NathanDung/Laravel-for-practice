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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/r', 'RController@create');

Route::get('/test', 'AwsController@test');

Route::get('/pay', 'RController@pay');

Route::post('/accept', 'RController@accept');

Route::get('/check', 'RController@check');