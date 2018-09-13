<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gym';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public $timestamps = true;


	
	
	public function validate($input){


		
		$rules = array(
			'user_id' => 'required|exists:user,user_id',
			'gym_id' => 'required||exists:gym,gym_id',
			'logbook_type_id' => 'required||exists:logbooktype,logbook_id',
			'action' => 'required',
			'where' => 'required',
			'success' => 'required'
		);

		$messages = array('required'=>'El :attribute es obligatorio',
		'exists'=>'El :attribute no se encuentra registrado'
		);

		$validator = Validator::make($input,$rules,$messages);

		return $validator;


	}

}