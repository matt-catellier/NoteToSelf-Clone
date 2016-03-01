<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// link to a table, declare which fields you can edit
	protected $table = 'users';
	protected $fillable = ['email', 'password'];
	protected $hidden = array('password', 'remember_token');
	public $timestamps = true;

	// to store error messages
	public $messages;

	public $passwordConfirm;

	// define all the rules for the form
	public static $rules = [
		'email' => 'required|email', // email is required and is actually an email
		'password' => 'required|min:3|max:80', // numbers and letter, more than 3 letters
		'passwordConfirm' => 'required|same:password' // required and has to match the other password
	];

	// create method to check if the form is valid
	public function isValid($data) {
		$v = Validator::make($data, static::$rules);

		if($v->passes()) {
			return true;
		}
		$this->messages = $v->messages();
		return false;
	}

}
