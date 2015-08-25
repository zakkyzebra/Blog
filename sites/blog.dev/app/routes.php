<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/resume', 'HomeController@resume');
Route::get('/portfolio', 'HomeController@portfolio');
Route::get('/home', 'HomeController@showWelcome');

Route::get('/', 'PostsController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/post', 'HomeController@post');

Route::resource('posts', 'PostsController');


Route::get('/rolldice/{guess}', function($guess)
{
    $data = array('guess' => $guess);
	return View::make('roll-dice')->with($data);
});

Route::get('orm-test', function ()
{
	$posts = Post::all();
	return $posts;
});



