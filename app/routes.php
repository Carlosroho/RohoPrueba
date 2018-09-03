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

Route::get('/', function(){return View::make('login');});
//routa para el controlador
Route::post('/login',array('uses'=>'LoginController@login'));
Route::post('/register',array('uses'=>'LoginController@register'));
Route::post('/load',array('uses'=>'LoginController@load'));
Route::post('/removeUser',array('uses'=>'LoginController@removeUser'));
Route::post('/updateUser',array('uses'=>'LoginController@updateUser'));