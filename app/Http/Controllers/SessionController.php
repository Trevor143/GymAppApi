<?php

namespace App\Http\Controllers;

use App\Gym;
use App\Http\Resources\Sessions as SessionResource;
use App\Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
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
        $session->gym_id = $request->input('gym_id');
        $session->instructor_id = $request->input('instructor_id');

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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        //
        $session = User::find($id)->session;
//        $session = Session::all();
        return SessionResource::collection($session);
//        return response()->json($session);
//        return array('session'=> $session);
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
