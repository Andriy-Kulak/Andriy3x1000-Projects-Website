<?php

	/*
	*	Home Page
	*/
Route::get('/', 'PagesController@home');

	/*
	*	Projects
	*/
Route::get('projects/create/confirm', 'ProjectsController@confirm');
Route::resource('projects', 'ProjectsController');


	/*
	*	Autherntication
	*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
