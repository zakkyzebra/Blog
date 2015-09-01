<?php

	class Post extends Eloquent
	{
	    protected $table = 'posts';
	    public function user()
		{
		    return $this->belongsTo('User');
		}
		public function comments()
		{
			return $this->hasMany('Comment');
		}

		public function tags()
		{
			return $this->belongsToMany('Tag', 'post_tag')->withTimestamps();
		}

		public static $rules = array(
			'title' => 'required|max:40',
			'body' => 'required|max:10000',
			'body' => 'required|min:10',
			'description' => 'required|max:128',
		);
		public static function renderBody($post)
		{
			$Parsedown = new Parsedown();
			$dirty_html = $Parsedown->text($post);

			$purifier = new HTMLPurifier();
			$clean_html = $purifier->purify($dirty_html);

			return $clean_html;
		}

		public static function urlBuilder()
		{
			$getRequests = Input::except('p');
			if(isset($getRequests['user'])){
				return "?user=" . $getRequests['user'];
			}elseif(isset($getRequests['tag'])){
				return "?tag=" . $getRequests['tag'];
			}elseif(isset($getRequests['search'])){
				return "?search=" . $getRequests['search'];
			}
		}
	}