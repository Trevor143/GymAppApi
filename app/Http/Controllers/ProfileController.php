<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Http\Resources\Users as UserResource;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        echo  "This is index method";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'user_id' =>'required',
            'weight' =>'required',
            'targetWeight'=>'required'
        ]);
        if ($validator->fails()){
            return array(
                'error'=>true,
                'message'=>$validator->errors()->all()
            );
        }

        $profile = new Profile();

        $profile->user_id = $request->input('user_id');
        $profile->age = $request->input('age');
        $profile->weight = $request->input('weight');
        $profile->targetWeight = $request->input('targetWeight');
        $profile->gym_id = $request = $request->input('gym_id');
        $profile->latitude = $request->input('latitude');
        $profile->longitude = $request->input('longitude');

        $profile->save();

        return array(
            'error'=>false,
            'profile' => $profile
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        //
        $profile = User::find($id)->profile;

//        return new UserResource($profile);
        return array('profile'=> $profile);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
