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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'roles:cleaning-company']], function(){
	//Item resource controller
	Route::resource('pre/item', 'ItemsController')->except(['show', 'destroy']);

	//Checklist resource controller
	Route::resource('pre/checklist', 'ChecklistsController')->except([ 'destroy']);

	//Checklist resource controller
	Route::post('pre/checklist/{id}/use_again', 'ChecklistsController@useAgainCheclistById')->name('checklist.use_again');

});

Route::group(['middleware' => ['auth', 'roles:cleaning-company|property-owner']], function(){
	//task route
	Route::get('pre/task', 'TasksController@index')->name('task.index');
	Route::get('pre/task/create/checklist/{checklist_id}', 'TasksController@create')->name('task.create');
	Route::post('pre/task/store', 'TasksController@store')->name('task.store');
});