<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
      
        try{

            $username = Input::get("username");
            $password = Input::get("password");
    
            $user = User::where ('username', $username)-> where ('password', $password)->get();
    
            if(count($user)>0){
                return array('error'=> false,'message' => 'Usuario Encontrado', 'data'=>'');
            }
            else{
                return array('error'=> true,'message' => 'Usuario No Registrado', 'data'=>'');
            }

        }
        catch(Exception $e){
            return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>$e->getMessage());
       }



    }
    

    public function register()
	{
        try
        {
            $user = new User();

           
        $input = Input::all();

         $validator = $user->validate($input);


         //var_dump($validator);



         if ($validator->passes())
        {
                

                $username = Input::get("username");
                $password = Input::get("password");
               // $password = Hash::make($password);
                $user->username = $username;
                $user->password = $password;

                $user-> save();

                return array('error'=> false,'message' => 'Usuario Registrado correctamente', 'data'=>'');

            }

        else{
           $men = $validator->errors();
           
        

            return array('error'=> false,'message' => 'Error al validar los datos', 'data'=>$men);

            }

      

        }
        catch(Exception $e){
             return array('error'=> true,'message' => 'Hubo un error al insertar usuario', 'data'=>$e->getMessage());
        }
       
    }
    



    public function load()
	{
        try
        {


        $users = DB::table('user')->get();

        return array('error'=> false,'message' => 'Datos Recuperados Exitosamente', 'data'=> $users);
        }


        catch(Exception $e){
            return array('error'=> true,'message' => 'Hubo un error al obtener datos usuario', 'data'=>$e->getMessage());
       }
      //  foreach ($users as $user)
      //  {
      //      var_dump($user->user_id,$user->username, $user->password);
      //  }
      
        
    }
    


    public function removeUser()
	{
        try
        {
            $user_id = Input::get("user_id");
           $re= DB::table('user')->where('user_id', '=', $user_id)->delete();

        return array('error'=> false,'message' => 'Usuario Eliminado Exitosamente', 'data'=> '');
        }


        catch(Exception $e){
            return array('error'=> true,'message' => 'Hubo un error al eliminar los datos del usuario', 'data'=>$e->getMessage());
       }
      //  foreach ($users as $user)
      //  {
      //      var_dump($user->user_id,$user->username, $user->password);
      //  }
      
        
    }
    public function updateUser(){
        try
        {

            $user = new User();

           
        $input = Input::all();

         $validator =$user->validate($input);

         if ($validator->passes())
         {
              


            $user_id = Input::get("user_id");
            $username = Input::get("username");
            $password = Input::get("password");
        //    $password = Hash::make($password);


           $up= DB::table('user')->where('user_id', $user_id)
            ->update(array('username' => $username,'password'=>$password));
          

        return array('error'=> false,'message' => 'Usuario Modificado Exitosamente', 'data'=> '');

         }
         else{
            $men = $validator->errors();
            $error = json_decode($men);

            return array('error'=> false,'message' => 'Error   ', 'data'=>$men);

         }


        }


        catch(Exception $e){
            return array('error'=> true,'message' => 'Hubo un error al modificar los datos del usuario', 'data'=>$e->getMessage());
       }
    }

}