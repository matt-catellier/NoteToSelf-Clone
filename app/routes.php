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


Route::get('forgot', function() {
    return View::make('users.forgot');
});

Route::resource('email', 'EmailController');
Route::get('sendConfirmation', 'EmailController@sendConfirmation');
Route::get('sendPassword', 'EmailController@sendPassword');

Route::get('email2', function() {
    Mail::send('emails.welcome', array('key' => 'value'), function($message)
    {
        $message->to('mattcatellier@gmail.com', 'Matt')->subject('Welcome!');
    });
    return 'email';// View::make('emails.welcome');
});

