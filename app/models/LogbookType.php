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
	protected $table = 'logbooktype';
	protected $primaryKey = 'logbook_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public $timestamps = true;


	public function __construct($name) {
		$this->name = $name;
	}

	public function validate() {

		try
		{
			$infos = $this->name;
			$info=array("name"=>$this->name);	
			$rules = array
			(
				'name' => 'required'
			);

			$messages = array
			(
				'required'=>'El :attribute es obligatorio'
			);
			$validator = Validator::make($info,$rules,$messages);

			if ($validator->passes())
        	{
                $this-> save();
                return array('error'=> false,'message' => 'Logeo Registrado correctamente', 'data'=>'');
            }
			else
			{
				$men = $validator->errors();
				return array('error'=> false,'message' => 'Error al validar los datos', 'data'=>$men);
			}
		}
		catch(Exception $e)
		{
			return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>$e->getMessage());
	   	}
	}
}