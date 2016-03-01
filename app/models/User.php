<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// link to a table, declare which fields you can edit
	protected $table = 'users';
	protected $fillable = ['username', 'password'];
	protected $hidden = array('password', 'remember_token');

	// to store error messages
	public $messages;

	// define all the rules for the form
	public static $rules = [
		'username' => 'required|email', // email is required and is actually an email
		'password' => 'required|alphaNum|min:3' // numbers and letter, more than 3 letters
	];

	// create method to check if the form is valid
	public function isValid() {
		$v = Validator::make($this->attributes, static::$rules);
		if($v->passes()) {
			return true;
		}
		$this->messages = $v->messages();
		return false;
	}

}
