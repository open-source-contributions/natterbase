<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('signup', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::group(['middleware' => ['auth']], function() {
	Route::get('countries', 'CountryController@index');
	Route::post('countries', 'CountryController@create');
	Route::put('countries/{id}', 'CountryController@update');
	Route::delete('countries/{id}', 'CountryController@delete');
	Route::get('activities', 'ActivityController@index');
});
