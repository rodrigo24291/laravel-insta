<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
      public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
     public function images()
    {
        return $this->belongsTo('App\Image','image_id');
    }
    
      public function like()
    {
        return $this->belongsTo('App\User','like_id');
    }
    
     
}
