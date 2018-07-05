<?php

namespace App\Http\Controllers;

use App\Gym;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    //
    public function instingym($id){
        $instructors = Gym::find($id)->instructor;
        return array('instructors'=>$instructors);
    }
}
