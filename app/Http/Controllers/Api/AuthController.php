<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
           'email' =>'required',
            'name'=> 'required',
            'password'=> 'required'
        ]);

        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->gender=$request->gender;
        $user->password =bcrypt($request->password);

        $user->save();

        $guzzle = new Client;

        $response = $guzzle->post('http://gymapp.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => '6noTyxC8x4E5R2QrR9jw9Qazfd1sKROMqlvz2lCP',
                'username'=>$request->email,
                'password'=>$request->password,
                'scope' => '',
            ],
        ]);
        return $response;
//        return response(['data'=> json_decode((string) $response->getBody(),true)]);

//        return json_decode((string) $response->getBody(), true)['access_token'];



    }

    public function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password'=> 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user){
            return response(['status'=>'error', 'meesage'=> 'User not found']);
        }

        if (Hash::check($request->password, $user->password)){
            $guzzle = new Client;

            $response = $guzzle->post('http://gymapp.test/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => '6noTyxC8x4E5R2QrR9jw9Qazfd1sKROMqlvz2lCP',
                    'username'=>$request->email,
                    'password'=>$request->password,
                    'scope' => '',
                ],
            ]);

        return response(['data'=> json_decode((string) $response->getBody(),true)]);

        }
    }
}
