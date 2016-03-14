<?php

class SessionsController extends \BaseController {

	public function index()
	{
		//
	}


	// loads the form...
	public function create()
	{
		if(Auth::check()) // if their logged in
		{
			return 'logged in';
		}
		if(!empty($_REQUEST['e'])) {
			return View::make('sessions.create', ['email' => $_REQUEST['e']]);
		}
		return View::make('sessions.create', ['email' => '']);
	}

	public function store() // willl log them in...
	{
		if(Auth::attempt(Input::only('email', 'password'))) {
			// if successful laravel will create a session and we can access it via Auth::user()
			return Redirect::to('/notes');
		} else {
			return Redirect::back()->withInput();
		}
	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}


	public function destroy()
	{
		Auth::logout();
		return Redirect::to('login');
	}


}
