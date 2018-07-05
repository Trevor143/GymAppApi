<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::post('details', 'API\AuthController@details');

Route::get('profile', 'ProfileController@index');
Route::post('saveprof', 'ProfileController@store');
Route::get('profile/{id}', 'ProfileController@show');

//sessions routes
Route::post('savesession', 'SessionController@store');
Route::get  ('showsession/{id}', 'SessionController@show');

//Route::get  ('session/{id}', 'SessionController@show');


Route::get('gyms', 'GymController@index');
Route::get('gyms/{id}', 'GymController@select');

Route::get('showUsers/{id}', 'GymController@showUsers');

Route::get('instructor/{id}','InstructorController@instingym');




