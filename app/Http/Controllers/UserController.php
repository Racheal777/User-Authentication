<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
//use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    //Register
    public function register(SignupRequest $request)
    {
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');

        $user->save();
        
        
        //ceating token
        $token = $user->createToken($user->firstname);
        $accessToken = $token->accessToken;

       // event(new Registered($user));

        return response()->json([
            'user'=> new UserResource($user),
            'accessToken' => $accessToken,
           
        ]);
    }



    //display all users
    public function allusers(User $user){
        $user = User::all();

        return new UserCollection($user);
    }
}
