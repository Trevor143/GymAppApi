<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class GymController extends Controller
{
    //
    public function index()
    {
        $gyms = Gym::all();
        return array('gyms'=> $gyms) ;
//        return json_decode($gyms,false);
    }

    public function select($id){
        $gym = Gym::find($id);
        return array('gym'=>$gym);
    }
    public  function showUsers($id){
        $users = Gym::where('user_id', $id)->gym;
        return $users;
    }
}
