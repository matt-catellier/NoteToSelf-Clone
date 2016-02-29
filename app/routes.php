<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

// routes for login
Route::get('/login', array('uses' => 'HomeController@showLogin')); // show form
Route::post('/login', array('uses' => 'HomeController@doLogin')); // process form

Route::get('/logout', array('uses' => 'HomeController@doLogout')); // logout
Route::get('/secure', 'HomeController@showSecure'); // logged in page

// routes for register
Route::get('/register', array('uses'=>'HomeController@showRegister')); // show form
Route::post('/register', array('uses'=>'HomeController@doRegister')); // process form
