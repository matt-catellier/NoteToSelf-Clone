<?php

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class NotesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /notes
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('notes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /notes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// try and build an array of values to send to the view...
		// always send the same array, with some values as '' and others with actual values
		$userID = Auth::user()->id;

		// need to get data here to set the fields to have values...
		$values = array();
		if(Note::where('user_id', '=', $userID)->exists()) {
			$values['notes'] = Note::where('user_id', '=', $userID)->first()->notes;
		} else {
			$values['notes'] = '';
		}

		if(Tbd::where('user_id', '=', $userID)->exists()) {
			$values['tbds'] = Tbd::where('user_id', '=', $userID)->first()->tbd;
		} else {
			$values['tbds'] = '';
		}
		if(Websites::where('user_id', '=', $userID)->exists()) {
			$websites = Websites::where('user_id', '=', $userID)->take(5)->get();
			$links = array();
			for($i = 0; $i < count($websites); $i++) {
			 	$links[$i] = $websites[$i]->website;
			}
			 $values['websites'] = $links;
		} else {
			$values['websites'] = ['', '', '', '', ''];
		}

		if(Image::where('user_id', '=', $userID)->exists()) {
			$images = Image::where('user_id', '=', $userID)->take(4)->get();
			$paths = array();
			for($i = 0; $i < count($images); $i++) {
				$paths[$i] = $images[$i]->path;
			}
			$values['images'] = $paths;
		} else {
			$values['images'] = ['','','',''];
		}

		return View::make('notes/index', $values);
		// return 'Notes';//View::make('notes.index');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /notes
	 *
	 * @return Response
	 */
	public function store()
	{
		// delete checked images
		if(isset($_POST['delete'])) {
			$delete = $_POST['delete'];
			for($i = 0; $i < count($delete); $i++) {
				Image::where('path', '=', $delete[$i])->delete();
			}
		}

		$image = Input::file('images');
		if($image != null ) {
			$path = 'uploadedImages/' . Auth::user()->email . '/';
			$image->move('public/'. $path, $image->getClientOriginalName());
			Image::create([
				'user_id'=> Auth::user()->id,
				'path'=> $path . $image->getClientOriginalName()
			])->save();

			// return $path . $image->getClientOriginalName();
		} else {
			// return 'null';
		}


		$this->saveNotes();
		$this->saveTbd(); // need to set up the tbd class still
		$this->saveWebsites();
		return Redirect::to('notes');
		//
	}

	function saveNotes() {
		$userID = Auth::user()->id;
		$notes = Input::get('notes');
		$notesExist= Note::where('user_id', '=', $userID)->exists();
		if($notesExist) { // update
			Note::where('user_id', '=', $userID)->update(['notes'=>$notes]);
		} else { // create
			$note = Note::create([
				'user_id'=> $userID,
				'notes'=>$notes
			]);
			$note->save();
		}
	}


	function saveTbd() {
		$userID = Auth::user()->id;
		$tbd = Input::get('tbd');
		$tbdExist= Tbd::where('user_id', '=', $userID)->exists();
		if($tbdExist) { // update
			Tbd::where('user_id', '=', $userID)->update(['tbd'=>$tbd]);
		} else { // create
			$newTbd = Tbd::create([
				'user_id'=> $userID,
				'tbd'=> $tbd
			]);
			$newTbd->save();
		}
	}

	function saveWebsites() {
		$userID = Auth::user()->id;
		$websites = Input::get('websites');
		if(Websites::where('user_id', '=', $userID)->exists()) {
			for($i = 0; $i < count($websites) ; $i++) {
				Websites::where('user_id', '=', $userID)->delete();
			}
		}
		for($i = 0; $i < count($websites) ; $i++) {
			$newWebsite = Websites::create([
				'user_id'=> $userID,
				'website'=> $websites[$i]
			]);
			$newWebsite->save();
		}
	}





	/**
	 * Display the specified resource.
	 * GET /notes/{id}
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
	 * GET /notes/{id}/edit
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
	 * PUT /notes/{id}
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
	 * DELETE /notes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}