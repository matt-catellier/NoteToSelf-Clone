<?php

class SessionsController extends \BaseController {

	public function index()
	{
		//
	}


	public function create()
	{
		if(Auth::check()) // if their logged in
		{
			return 'logged in';
		}
		return View::make('sessions.create');
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
