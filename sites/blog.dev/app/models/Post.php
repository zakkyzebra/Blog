<?php

	class Post extends Eloquent
	{
	    protected $table = 'posts';

		public static $rules = array(
			'title' => 'required|max:40',
			'body' => 'required|max:10000',
			'body' => 'required|min:10',
		);

	}