<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	/****
		Show the Home Page
	****/
	public function getHome()
	{

		$items = Items::where('completed',0)->get();
		$completed = Items::where('completed',1)->get();


		return View::make('home', array(
				'items' => $items,
				'completed' => $completed
			));
	}


	/****
		Completed tasks post
	****/
	public function postHome()
	{
		$id = Input::get('id');


		$items = Items::findorfail($id);
		$items->complete();
		return Redirect::route('home');

	
	}


	/****
		New Task Post
	****/
	public function postNew()
	{
		// Get input values
		$task = Input::get('new');
		$dater = Input::get('date');
		$hour = Input::get('hour');
		$minute = Input::get('minutes');

		$date = $dater.' '.$hour.':'.$minute.':00';
		$date = strtotime($date); 
		$date = Date("Y-m-d H:i:s", $date);


		// Validation
		$rules = array('new' => 'required|min:5|max:255');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('home')->withErrors($validator);

		}

		//Add new task
		$items = new Items;
		$items->name = $task;
		$items->dueDate = $date;
		$items->save();

		return Redirect::route('home');
	}



	/****
		Clear all completed tasks
	****/
	public function postClear()
	{

		$clear = Input::get('clear');

		// make sure submit was clicked
		if (!empty($clear)) {
			
			$items = Items::where('completed',1)->delete();


		}

		return Redirect::route('home');

	}

}
