<?php

namespace App\Http\Controllers;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    
    
    
    function insertar(Request $request){
        
        $validation=$request->validate([
            'id_imagen'=>'integer|required',
            'contenido'=>'string|required',
            
        ]);
        $user=\auth::user()->id;
        $id=$request->input('id_imagen');
        $contenido=$request->input('contenido');
        
        $comentario=new Comment();
        $comentario->image_id=$id;
        $comentario->content=$contenido;
        $comentario->user_id=$user;
        
        $comentario->save();
        
        return redirect()->route('dar.per',['fo'=>$id]);
    }
    
    function delete($id){
        
     $id_coment=comment::find($id);
     if($id_coment){
         
        $id_coment->delete(); 
     }
    
        return redirect()->route('dar.per',['fo'=>$id_coment->image_id]);
    }
    
    
}
