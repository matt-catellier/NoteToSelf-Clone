<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Websites extends \Eloquent implements UserInterface, RemindableInterface  {
	// link to a table, declare which fields you can edit
	use UserTrait, RemindableTrait;
	protected $table = 'websites';
	protected $fillable = ['user_id', 'website'];
	public $timestamps = true;
}