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

/** Load home page **/
Route::get('/', array(
		'as' => 'home',
		'uses' => 'HomeController@getHome'
	)
);

/** item form post **/
Route::post('/', array(
		'uses' => 'HomeController@postHome'
	)
);


/** new item post **/
Route::post('/new', array(
		'uses' => 'HomeController@postNew'
	)
);

/** clear completed tasks **/
Route::post('/clear', array(
		'uses' => 'HomeController@postClear'
	)
);


