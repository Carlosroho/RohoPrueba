<?php

class LogbookController extends BaseController {

	public function register() {
		$type= Input::get('temp');
		$name= Input::get('name');
		$obj = Builder::callFactory($type, $name);
	}

	public function excharge(){
		try
		{
			$person= Input::get('username');
			$stday= Input::get('stday');
			$enday= Input::get('enday');
			$nick = User::where ('username', $person)->get();

			if(count($nick)>0)
			{
				$datauser = DB::table('user')->where('username', $person)->get();
				$key = $datauser[0]->user_id;
				$datalog =  DB::table('logbook')->where('user_id','=', $key)
				->whereBetween(DB::raw('date(created_at)'),[$stday, $enday])->get();
				
				if(count($datalog)>0)
				{
					return array('error'=> false,'message' => 'Usuario Encontrado', 'data'=>$datalog);
				}
				else
				{
					return array('error'=> false,'message' => 'El Usuario no tiene errores registrados', 'data'=>'');
				}
			}
			else
			{
				return array('error'=> false,'message' => 'Usuario No Registrado', 'data'=>'');
			}

		}
		catch(Exception $e){
			return array('error'=> true,'message' => 'Error al hacer la peticion', 'data'=>$e->getMessage());
		}
	}



	public function error() {
		$error= Input::get('type');
		$obj = Builder::checkdata();
		var_dump($obj);
	}

	public function send() {

		try
		{
			$user= Input::get('userconfirm');
			$pass= Input::get('passconfirm');
			$gym = 2;
			$nick = User::where ('username', $user)->get();
			if(count($nick)>0)
			{
				$key = $nick[0]->user_id;
				$username = User::where ('username', $user)-> where ('password', $pass)->get();
				$gymn = Gym::where ('gym_id', $gym)->get();
		
				if(count($username)>0)
				{
					return array('error'=> false,'message' => 'Login Correcto', 'data'=> $user);
				}
				else
				{				
					$obj = Builder::checkdata($key,$gym);
					return array('error'=> true,'message' => 'Contraseña Equivocada, Error:', 'data'=>'');
				}

			}
			else
			{
				return array('error'=> true,'message' => 'Usuario No Registrado', 'data'=>'');
			}

		}
		catch(Exception $e){
			return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>$e->getMessage());
		}
	}   
}