<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*** GET Routes ***/

Route::get('/', 'VoteController@index');
Route::get('/econ-410/tutors', 'VoteController@tutors');
Route::get('/econ-410/documents', 'VoteController@documents');
Route::get('/econ-410/links', 'VoteController@links');


/*** POST Routes ***/

Route::post('/api/vote', 'VoteController@voteTutors');
