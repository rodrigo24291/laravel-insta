<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
class UserController extends Controller {

    function index() {
        return view("usuario.configuracion");
    }

    function update(Request $request) {
        
        $user=\auth::user();
        $id=$user->id;
        $validates=$request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
    ]);
       
        $nombre = $request->input('name');
        $apellido = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $foto = $request->file('foto');
        
       
        $user->name=$nombre;
        $user->surname=$apellido;
        $user->nick=$nick;
        $user->email=$email;
        if($foto){
        $nombre_imagen=time().$foto->getClientOriginalName();
        
        storage::disk('user')->put($nombre_imagen,file::get($foto));
        
        $user->image=$nombre_imagen;
        }
        
        $user->update();
        
        
        return redirect()->route('config')->with(['seci'=>'registro completo']);
        
    }
    
    function enviar($file){
        
        $image= storage::disk('user')->get($file);
     return new Response($image, 200);   
    }
    
    function miperfil($id){
        $usuario=user::find($id);
        
        return view('usuario.perfil',['us'=>$usuario]);
    }

    function mostrargente($name=null){
        
        
        if(!empty($name)){
        $nombre=$name;
        
        $usuarios=User::where('name','LIKE','%'.$nombre.'%')->get();
        
            
        }
        
        else{
        
        $usuarios=User::all();
        
    
        }
                return view('usuario.todos',['gente'=>$usuarios]);

        
        }
    
    
    
}
