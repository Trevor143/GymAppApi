<?php

namespace App\Http\Controllers;

use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
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
        $session = new Session();
        $validator = Validator::make($request->all(), [
            'exerciseType' => 'required',
            'Sets' => 'required',
        ]);
        if ($validator->fails()) {
            return array(
                'error' => true,
                'message' => $validator->errors()->all()
            );
        }

        $session->user_id = $request->input('user_id');
        $session->exerciseType = $request->input('exerciseType');
        $session->Sets = $request->input('Sets');
        $session->duration = $request->input('duration');
        $session->latitude = $request->input('latitude');
        $session->longitude = $request->input('longitude');

        $session->save();

        return array(
            'error' => false,
            'profile' => $session
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
        $session = User::find($id)->session;


        return array('error'=>false, 'sessions'=>$session);
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
