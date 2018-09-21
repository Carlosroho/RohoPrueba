<?php


class Factory {

    public static function desing($u,$g) {   
        try
        {
            $logFile = 'login.log';
            Log::useDailyFiles(storage_path().'/logs/logbook/'.$logFile);
            $logbook = new Logbook($u,$g);
            $validator = $logbook->validate();
            if ($validator->passes())
            {     
                $logbook-> save();      
                Log::debug('Error al Iniciar Sesion  '. ' Contraseña equivocada del usuario : '.$logbook->getData());
            }
           else
            {
                Log::debug('Error al guardar el log  '. ' datos : '.$logbook->getData());
                $men = $validator->errors();
                return array('error'=> false,'message' => 'Error al registrar el error', 'data'=>$men);
            }
        }
        catch(Exception $e)
        {
            Log::debug('Error al guardar el log  '. ' datos : '.$logbook->getData());
            return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>'');     
   		}

    }

    public function createGym($name){
        try
        {
            $gym = new Gym($name);
            $validator = $gym->validate();
            if ($validator->passes())
            {                 
                $gym-> save();
                return $gym;  
            } 
            else
            {
                $men = $validator->errors();
                return array('error'=> false,'message' => 'Error al validar los datos', 'data'=>$men);
            }
        }
        catch(Exception $e)
        {
			return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>'');
   		}

    }

    public static function rev(){

        try
        {
            $usuario = User::where('id', 47);
            if (!$usuario) 
            {
                // Devuelve un mensaje indicando que no existe un usuario con el id recibido.
                return array('error'=> false,'message' => 'Usuario no encontrado', 'data'=>'');
            }
            // Continúan las instrucciones porque el usuario sí existe.
            return array('error'=> false,'message' => 'Usuario encontrado', 'data'=>'');
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>$e->getMessage());
        }         
    }
 
}











