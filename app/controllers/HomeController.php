<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLogin() // return view with form
	{
		return View::make('login');
	}

	public function doLogin() // process form
	{
		// create rules for input
		$rules = array(
			'username' => 'required|email', // email is required and is actually an email
			'password' => 'required|alphaNum|min:3' // numbers and letter, more than 3 letters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// check if valid
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}

		// check if user exists in DB
		// create our user data for the authentication
		$userdata = array(
			'username'     => Input::get('username'),
			'password'  => Input::get('password')
		);

		// attempt to do the login
		if (Auth::attempt($userdata)) {
			return Redirect::to('secure');

		} else {
			// validation not successful, send back to form
			// need to send an error message
			return Redirect::to('login');
		}
	}

	public function doLogout() // logout user out
	{
		Auth::logout();
		return Redirect::to('login');
	}

	public function showSecure() {
		return View::make('secure');
	}

}
