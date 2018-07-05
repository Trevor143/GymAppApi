<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function gym(){
        return $this->belongsTo('App\Gym');
    }
    public function instrcutor(){
        return $this->hasOne('App\Instructor');
    }
}
