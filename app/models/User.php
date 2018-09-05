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
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $timestamps = true;

	

	public function validate($input){


		
		$rules = array(
			'username' => 'required|unique:user,username|min:4',
			'password' => 'required|min:4');

		$messages = array('required'=>'El :attribute es obligatorio',
		'min'=>'El :attribute debe contener almenos 4 caracteres',
		'unique'=>'El :attribute ya existe'
		);

		$validator = Validator::make($input,$rules,$messages);

		return $validator;


	}

	public function validatetwo($input){


		
		$rules = array(
			'username' => 'required|unique:user,username|min:4',
			'password' => 'required|min:4',
			'photo' => 'required|unique:user,photo'
		);

		$messages = array('required'=>'El :attribute es obligatorio',
		'min'=>'El :attribute debe contener almenos 4 caracteres',
		'unique'=>'El :attribute ya existe'
		);

		$validator = Validator::make($input,$rules,$messages);

		return $validator;


	}

}
