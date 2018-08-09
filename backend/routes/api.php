<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(['middleware' => ['cors','api']], function () {
	Route::get('title/{title}', 'API\IMDBAPIController@title');
	Route::get('getByIMDBId/{id}', 'API\IMDBAPIController@getById');
	Route::get('search/{keyword}/{year}', 'API\IMDBAPIController@search');
});
