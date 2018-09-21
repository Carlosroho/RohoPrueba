<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Logbook extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logbook';
	protected $primaryKey = 'history_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public $timestamps = true;

	 public function __construct($user,$gym) {
		$this->user_id = $user;
		$this->gym_id = $gym;
		$this->logbook_type_id = 1;
		$this->action = 'Error Al Logear';
		$this->where = 'whereejemplo';
		$this->success = 1;
	}
	

	public function validate() {

		$input = array 
		(
			'user_id' => $this->user_id ,
			'gym_id' => $this->gym_id ,
			'logbook_type_id' => $this->logbook_type_id ,
			'action' => $this->action ,
			'where' => $this->where ,
			'success' => $this->success
		);
		
		$rules = array
		(
			'user_id' => 'required|exists:user,user_id',
			'gym_id' => 'required||exists:gym,gym_id',
			'logbook_type_id' => 'required||exists:logbooktype,logbook_id',
			'action' => 'required',
			'where' => 'required',
			'success' => 'required'
		);

		$messages = array
		(
			'required'=>'El :attribute es obligatorio',
			'exists'=>'El :attribute no se encuentra registrado'
		);

		$validator = Validator::make($input,$rules,$messages);
		return $validator;


	}
	public function getData(){
		return 
		'Gym:'.
		$this->gym_id.
		' User id: '.
		$this->user_id.
		' Success'.
		$this->success.
		' where'.
		$this->where.
		' action'.
		$this->action;
	}

}