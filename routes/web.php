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

Route::get('/welcome', function () {

    return view('welcome');
});

Route::get('/', function () {
	return view('first',[
		'tasks' => [
			'Go to the store',
			'Go to the market',
			'Go to work',
			'Go to the concert'
		],
		'foo' => request('inputbyyourself')
	]); //Laravel video episode -5

	/* $tasks = [
	 	'Go to the store',
	 	'Go to the market',
	 	'Go to work',
	 	'Go to the concert'
	 ];

	 return view('first')->withtasks($tasks)->withfoo('Home');
	*/

	/*return view('first', [
    	'tasks' => $tasks,
    	'foo' => 'Home'
    	//Call foo in first.blade.php page can get 'Home' this result.

    	//'foo' => request('title')
    	//This array can be also like 'foo' => 'foobar', and when uses foo in first.blade.php view, it can returns "foobar".
    ]); */

});//Laravel影片-4

Route::get('/second', function () {
	return view('second');
});//Laravel影片-4

Route::get('/about', function () {
	return view('about');
});//Laravel影片-4

// Auth::routes();//make:auth自動生成

// Route::get('/home', 'HomeController@index')->name('home');//make:auth自動生成
