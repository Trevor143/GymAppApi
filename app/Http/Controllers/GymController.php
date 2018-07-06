<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Http\Resources\Gyms as GymsResource;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class GymController extends Controller
{
    //
    public function index()
    {
        $gyms = Gym::all();
//        return array('gyms'=> $gyms) ;
//        return json_decode($gyms,false);
        return GymsResource::collection($gyms);
    }

    public function select($id){
        $gym = Gym::find($id);
        return array('gym'=>$gym);
    }
    public  function showUsers($id){
        $users = Gym::where('user_id', $id)->gym;
        return $users;
    }

    public  function showinstructors($id){
        $instructors = Gym::find($id)->instructor;

        return $instructors;
    }
}
