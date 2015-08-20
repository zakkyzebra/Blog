<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function portfolio()
	{
		return View::make('portfolio');
	}

	public function resume()
	{
		return View::make('resume');
	}

	public function index()
	{
		return View::make('index');
	}

	public function about()
	{
		return View::make('about');
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function post()
	{
		return View::make('post');
	}

}
