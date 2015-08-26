<?php

	class Post extends Eloquent
	{
	    protected $table = 'posts';
	    public function user()
		{
		    return $this->belongsTo('User');
		}

		public static $rules = array(
			'title' => 'required|max:40',
			'body' => 'required|max:10000',
			'body' => 'required|min:10',
			'description' => 'required|max:128',
		);

	}