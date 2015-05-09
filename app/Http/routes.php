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

Route::get('/', 'WelcomeController@index');


Route::post('case', [
    'as' => 'case.post', 'uses' => 'CaseController@addCase'
]);

Route::get('case', [
    'as' => 'search.post', 'uses' => 'CaseController@getCase'
]);

Route::get('case/{id}', [
    'as' => 'search.post.id', 'uses' => 'CaseController@getCaseId'
]);

Route::get('upload/{id}', [
    'as' => 'upload.post.id', 'uses' => 'CaseController@addPhoto'
]);

Route::get('fliker', [
    'as' => 'fliker.get', 'uses' => 'CaseController@getFliker'
]);



/*
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/