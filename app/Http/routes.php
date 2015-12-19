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
// user authentication routes

// Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

// Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

// Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

// Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

// Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');


Route::get('/', 'WelcomeController@index');


Route::group(['middleware' => 'auth'], function() {
//project routes
Route::get('/projects', 'ProjectsController@getProject');
Route::get('/projects/new', 'ProjectsController@getCreate');
Route::post('/projects/new', 'ProjectsController@postCreate');

Route::get('/projects/edit/{id}','ProjectsController@getEdit');
Route::post('/projects/{id}','ProjectsController@postEdit');
Route::post('/projects/delete/{id}', 'ProjectsController@postDelete');

//delete routes for project
Route::get('projects/confirm-delete/{id}', 'ProjectsController@getConfirmDelete');
Route::get('projects/delete/{id}', 'ProjectsController@getDelete');

//tasks routes
Route::get('/tasks/show/{project_id}', 'TasksController@getShow');
Route::post('/tasks/new','TasksController@postCreate');
Route::get('/tasks/new/{project_id}','TasksController@getCreate');
Route::post('/tasks/edit', 'TasksController@postEdit');
Route::get('/tasks/edit/{id}','TasksController@getEdit');
Route::get('tasks/confirm-delete/{id}', 'TasksController@getConfirmDelete');
Route::get('/tasks/delete/{id}','TasksController@getDelete');

//routes for complete and incomlete tasks
Route::get('/tasks/show/incompleted/{project_id}','TasksController@getShowIncompleted');
Route::get('/tasks/show/completed/{project_id}','TasksController@getShowCompleted');
});
