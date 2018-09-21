<?php

class LoginController extends BaseController {
    
    public function login() {  
        try
        {
            $username = Input::get("username");
            $password = Input::get("password");
            $user = User::where ('username', $username)-> where ('password', $password)->get();
    
            if(count($user)>0)
            {
                return array('error'=> false,'message' => 'Usuario Encontrado', 'data'=> $user);
            }
            else
            {
                return array('error'=> true,'message' => 'Usuario No Registrado', 'data'=>'');
            }
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Error En la Consulta', 'data'=>$e->getMessage());
        }
    }
    

    public function register() {
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
            else
            {
                $men = $validator->errors();
                return array('error'=> false,'message' => 'Error al validar los datos', 'data'=>$men);
            }
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al insertar usuario', 'data'=>$e->getMessage());
        }
    }
    
    public function load() {
        try
        {
            $users = DB::table('user')->get();
            return array('error'=> false,'message' => 'Datos Recuperados Exitosamente', 'data'=> $users);
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al obtener datos usuario', 'data'=>$e->getMessage());
        }
      //  foreach ($users as $user)
      //  {
      //      var_dump($user->user_id,$user->username, $user->password);
      //  }  
    }
    


    public function removeUser() {
        try
        {
            $user_id = Input::get("user_id");
            $re= DB::table('user')->where('user_id', '=', $user_id)->delete();
            return array('error'=> false,'message' => 'Usuario Eliminado Exitosamente', 'data'=> '');
        }
        catch(Exception $e)
        {
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
            else
            {
                $men = $validator->errors();
                $error = json_decode($men);
                return array('error'=> false,'message' => 'Error   ', 'data'=>$men);
            }
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al modificar los datos del usuario', 'data'=>$e->getMessage());
        }
    }

    public function registerall() {
        try
        {
            $user = new User();
            $input = Input::all();
            $validator = $user->validatetwo($input);
            //var_dump($validator);
            if ($validator->passes())
            { 
                $file = Input::file("photo");
                $username = Input::get("username");
                $password = Input::get("password");
               // $password = Hash::make($password);
                $user->username = $username;
                $user->password = $password;
                $user->photo = Input::file("photo")->getClientOriginalName();//nombre original de la foto
                $user-> save();
                $file->move("public/img",$file->getClientOriginalName());
                return Redirect::to('/seeprofile');
            }
            else
            {
                $men = $validator->errors();
                return array('error'=> false,'message' => 'Error al validar los datos', 'data'=>$men);
            }
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al insertar usuario', 'data'=>$e->getMessage());
        }
       
    }

    public function charge() {
        try
        {
            $users = DB::table('user')->get();
            return array('error'=> false,'message' => 'Datos Recuperados Exitosamente', 'data'=> $users);
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al obtener datos usuario', 'data'=>$e->getMessage());
        }
      //  foreach ($users as $user)
      //  {
      //      var_dump($user->user_id,$user->username, $user->password);
      //  }  
    }

    public function updateimg() {
        try
        {
            $user_id = Input::get("id_picture");   
            $file = Input::file("newpicture");
            $up= DB::table('user')
            ->where('user_id', $user_id)
            ->update(array('photo' => Input::file("newpicture")->getClientOriginalName()));
            $file->move("public/img",$file->getClientOriginalName());
               //     return var_dump($file);
            return Redirect::to('/seeprofile');
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error al cambiar la imagen los datos del usuario', 'data'=>$e->getMessage());
        }
    }

    public function lemos() {
        try
        {
            $input = Input::all();
           // $file = Input::file("lefile");
            return var_dump($input);
        }
        catch(Exception $e)
        {
            return array('error'=> true,'message' => 'Hubo un error subir archivo', 'data'=>$e->getMessage());
        }
    }
}