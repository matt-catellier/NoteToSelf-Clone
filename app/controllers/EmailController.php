<?php

class EmailController extends BaseController {

	/**
	 * Display a listing of the resource.

	 * @return Response
	 */

	protected $email;

	public function index() {
		// use if statement to tell where came from...
		return View::make('users/forgot');
	}

	public function store()
	{
		$this->email = Input::get('email');

		$rules = array(
			'email' => 'required|email', // email is required and is actually an email
		);

		$validator = Validator::make(Input::all(), $rules);
		// check if valid
		if ($validator->fails()) {
			return Redirect::to('email')
				->withErrors($validator)// send back all errors to the login form
				->withInput(Input::all()); // send back the input (not the password) so that we can repopulate the form
		}
		$userExists= User::where('email', '=', $this->email)->exists();
		if($userExists) {

			$pass = str_random(15);
			$confirmation_code = str_random(30);
			// update users password
			User::where('email', '=', $this->email)->update(array('password'=>Hash::make($pass),
				'confirmation_code'=>$confirmation_code));

			Mail::send('emails.forgot', array('pass' => $pass,'email'=>$this->email, 'confirmation_code'=>$confirmation_code ), function($message)
			{
				$message->to($this->email, $this->email)->subject('Password Reset');
			});
			return View::make('emails/forgotSent', ['email' => $this->email]);
		} else {
			// View::make('users/forgot', ['error', 'Could not send email.  Are your sure your registered? ']);
			return 'no user with that email';
		}
	}


	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

//	public function sendConfirmation()
//	{
//		$email = Input::get('email');
//
//		return View::make('emails/welcome', ['key'=>'value']);
//	}
//
//	public function sendPassword()
//	{
//		$email = Input::get('email');
//
//		return View::make('emails/welcome', ['key'=>$email]);//$email;
//	}

}
