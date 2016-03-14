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
		if(!empty($_REQUEST['r']) && !empty($_REQUEST['e'])) {
			$email = $_REQUEST['e'];
			$confirmation_code = $_REQUEST['r'];
			$user = User::whereEmail($email)->first();
			if (!$user)
			{
				return 'no user with that email';
			} else { // there is a user with that email
				if($user->confirmation_code == $confirmation_code) {
					return View::make('emails.confirm', ['email' => urldecode($_REQUEST['e'])]);
				} else {
					return 'no confimation code';
				}
			}
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
