<?php
    class Comment extends Eloquent
    {
        protected $table = 'comments';
        //relationships
        public function user()
        {
            return $this->belongsTo('User');
        }
        public function post()
        {
            return $this->belongsTo('Post');
        }
        public static $rules = array(
            'comment'      => 'required|max:255',
        );
    }