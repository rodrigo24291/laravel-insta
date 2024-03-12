<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Like;

class LikeController extends Controller
{
    function megusta($image_id){
        $usuario_id=\auth::user()->id;
        $imagen=Like::where('image_id',$image_id)
                ->where('user_id',$usuario_id)->count();
        
if($imagen<1 ){
    $mancha=new like();
    $mancha->user_id=$usuario_id;
    $mancha->image_id=$image_id;
    $mancha->save();
}
        
    }
    
    function nomegusta($image_id){
        $usuario_id=\auth::user()->id;
        
       
        $imagen=Like::where('image_id',$image_id)
                ->where('user_id',$usuario_id)->first();

if($imagen){
    
    $imagen->delete();      
          
       
}
    
}
}
