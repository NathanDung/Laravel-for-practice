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

// Route::get('/', function () {
//     return view('first');
// });//Laravel影片-4

Route::get('/second', function () {
	return view('second');
});//Laravel影片-4

Route::get('/about', function () {
	return view('about');
});//Laravel影片-4

// Auth::routes();//make:auth自動生成

// Route::get('/home', 'HomeController@index')->name('home');//make:auth自動生成
