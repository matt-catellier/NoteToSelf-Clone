<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Note extends \Eloquent implements UserInterface, RemindableInterface  {
	// link to a table, declare which fields you can edit
	use UserTrait, RemindableTrait;
	protected $table = 'notes';
	protected $fillable = ['user_id', 'notes'];
	public $timestamps = true;
}