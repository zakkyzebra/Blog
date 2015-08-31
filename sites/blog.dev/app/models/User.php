<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	public function posts()
	{
	    return $this->hasMany('Post');
	}
	public function comments()
	{
		return $this->hasMany('Comment');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'username' => 'required|min:2|unique:users|max:20',
		'first_name' => 'min:2|max:25',
		'last_name' => 'min:2|max:25',
		'email' => 'required|min:1|unique:users|max:128|confirmed',
		'password' => 'required|min:6|max:20|confirmed',
	);
	public static $rules2 = array(
		'username' => 'min:2|unique:users|max:20',
		'first_name' => 'min:2|max:25',
		'last_name' => 'min:2|max:25',
		'email' => 'min:1|unique:users|max:128|confirmed',
		'password' => 'min:6|max:20|confirmed',
	);


	public function setPasswordAttribute($value)
	{
	    $this->attributes['password'] = Hash::make($value);
	}

}
