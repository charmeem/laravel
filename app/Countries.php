<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    // has many through relation
   public function posts(){
       return $this->hasManyThrough('App\Post', 'App\User' );

   }
}
