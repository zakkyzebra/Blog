<?php

class PostsController extends \BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('search')){
			//PAGINATES QUERY
			$query = Post::with('user');
			$query->WhereHas('user', function($q){
				$search = Input::get('search');
				$q->where('title', 'like', "%$search%");
			});

			$posts = $query->orderBy('created_at', 'desc')->paginate(4);
			return View::make('posts.index')->with(['posts'=> $posts]);
		}elseif (Input::has('user')){
			$query = Post::with('user');
			$query->WhereHas('user', function($q){
				$username = Input::get('user');
				$q->where('username', "$username");
			});
			
			$posts = $query->orderBy('created_at', 'desc')->paginate(4);
			return View::make('posts.index')->with(['posts'=> $posts]);
		}else{
			//PAGINATES ALL

			$posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
			return View::make('posts.index')->with(['posts'=> $posts]);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//create a post
		return View::make('posts.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if($validator->fails()){
			Session::flash('errorMessage', 'Something went wrong, refer to the red text below:');
			Log::info('validator failed', Input::all());
			return Redirect::back()->withInput()->withErrors($validator);
		}else{
			$posts = new Post();
			$posts->title = Input::get('title');
			$posts->body = Input::get('body');
			$posts->user_id = Auth::id();
			$posts->description = Input::get('description');
			$posts->save();
			return Redirect::action('PostsController@index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Post::find($id)){		
			$post = Post::find($id);
			return View::make('posts.show')->with('post', $post);
		}else{
			App::abort(404);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		if(Auth::check() && Auth::user()->id === $post->user_id){
			return View::make('posts.edit')->with('post', $post);
		}else{
			Session::flash('errorMessage', 'Can not edit a post that is not yours.');
			return View::make('posts.show')->with('post', $post);
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}else{
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->description = Input::get('description');
			$post->save();
			return Redirect::action('PostsController@show', array($id));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		if(Auth::check() && Auth::user()->id === $post->user_id){
			$post->delete();
			return Redirect::action('PostsController@index');
		}else{
			Session::flash('errorMessage', 'Can not delete a post that is not yours.');
			return View::make('posts.show')->with('post', $post);
		}
	}


}
