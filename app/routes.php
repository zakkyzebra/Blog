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
//exercises
Route::get('/resume', 'HomeController@resume');
Route::get('/portfolio', 'HomeController@portfolio');
Route::get('/home', 'HomeController@showWelcome');

//navbar routes
Route::get('/', 'PostsController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/post', 'HomeController@post');

//user routes
Route::get('/login', 'HomeController@showLogin');
Route::post('/login', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@doLogout');
Route::get('/usercreate', 'HomeController@showCreate');
Route::post('/usercreate', 'HomeController@newUser');

//posts routes
Route::resource('posts', 'PostsController');


Route::get('/rolldice/{guess}', function($guess)
{
    $data = array('guess' => $guess);
	return View::make('roll-dice')->with($data);
});

Route::get('orm-test', function ()
{
	View::make();
});



