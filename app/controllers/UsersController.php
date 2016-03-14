<?php

class UsersController extends \BaseController {

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index() // show all users
	{
		// return $this->users->all();
		return View::make('users/index', ['users'=>$this->user->all()]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() // registration form...
	{
		return View::make('users/create');
	}


	// this is to create a new user
	// needs a second input field
	public function store()
	{
		$input = Input::all();

		// $this->user->fill($input);

		$this->user->email = Input::get('email');
		$this->user->password = Hash::make(Input::get('password'));

		// 1 step check, all logic is in the model
		if(!($this->user->isValid($input))) {
			return Redirect::back()->withInput()->withErrors($this->user->messages);
		}

		$confirmation_code = str_random(30);

		$user = User::create([
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password')),
			'confirmation_code' => $confirmation_code
		]);

		$user->save();

		Mail::send('emails.registration', ['email'=>$this->user->email, 'confirmation_code'=>$confirmation_code ], function($message)
		{
			$message->to($this->user->email, $this->user->email)->subject('Registration');
		});

		return View::make('users.registration', ['email'=>$this->user->email]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
}
