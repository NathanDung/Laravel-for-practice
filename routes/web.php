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

// Route::resource('/projects', 'ProjectsController');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::get('/projects/{project}', 'ProjectsController@show');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/{project}/edit', 'ProjectsController@edit');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');

// Route::get('/', 'PagesController@home');
// Route::get('/second', 'PagesController@second');
// Route::get('/about', 'PagesController@about');

/*Route::get('/', function () {
	return view('first',[
		'tasks' => [
			'Go to the store',
			'Go to the market',
			'Go to work',
			'Go to the concert'
		],
		'foo' => request('inputbyyourself')
	]); //Laravel video Episode -5

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
    ]); 

}); Laravel Episoda -4 */

/* Route::get('/second', function () {
	return view('second');
});//Laravel Episoda -4 */

/* Route::get('/about', function () {
	return view('about');
});//Laravel Episoda -4 */

// Auth::routes();//make:auth自動生成

// Route::get('/home', 'HomeController@index')->name('home');//make:auth自動生成
