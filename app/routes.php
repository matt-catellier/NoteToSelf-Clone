<?php

Route::get('/', 'HomeController@showWelcome');

// All user create, update delete
Route::resource('users', 'UsersController');

// SESSION MANAGEMENT
Route::get('login', 'SessionsController@create'); // alias
Route::get('logout', 'SessionsController@destroy'); // alias

Route::resource('sessions', 'SessionsController');

Route::get('notes', function() {
    return View::make('notes/index');
})->before('auth');
