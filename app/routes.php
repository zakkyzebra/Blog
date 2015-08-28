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
Route::get('/login', 'UsersController@showLogin');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@doLogout');
Route::get('/usercreate', 'UsersController@showCreate');
Route::post('/usercreate', 'UsersController@newUser');
Route::get('/editprofile', 'UsersController@showEdit');
Route::put('/editprofile', 'UsersController@editProfile');

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



