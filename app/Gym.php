<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    //
    public function session(){
        return $this->hasMany('App\Session');
    }
     public function instructor(){
        return $this->hasMany("App\Instructor");
     }
     public function profile(){
        return $this->belongsToMany('App\Profile');
     }
     public function user(){
        return $this->hasMany('App\User');
     }

}
