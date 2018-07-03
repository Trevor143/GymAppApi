<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


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
        return array('profile'=>$profile);

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
