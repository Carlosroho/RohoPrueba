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
Route::get('/seeuser', function(){return View::make('test');});
Route::get('/seeprofile', function(){return View::make('profile');});
Route::get('/seepicture', function(){return View::make('vision');});
Route::get('/prueba', function(){return View::make('add');});
Route::get('/expire', function(){return View::make('expire');});
Route::get('/bita', function(){return View::make('bita');});
//routa para el controlador
Route::post('/login',array('uses'=>'LoginController@login'));
Route::post('/register',array('uses'=>'LoginController@register'));
Route::post('/load',array('uses'=>'LoginController@load'));
Route::post('/removeUser',array('uses'=>'LoginController@removeUser'));
Route::post('/updateUser',array('uses'=>'LoginController@updateUser'));
Route::post('/registerall',array('uses'=>'LoginController@registerall'));
Route::post('/charge',array('uses'=>'LoginController@charge'));
Route::post('/updateimg',array('uses'=>'LoginController@updateimg'));
Route::post('/lemark',array('uses'=>'LoginController@lemos'));
Route::post('/addGym',array('uses'=>'LogbookController@register'));
Route::post('/addBlock',array('uses'=>'LogbookController@error'));
Route::post('/logdev',array('uses'=>'LogbookController@send'));
Route::post('/adjust',array('uses'=>'LogbookController@excharge'));



