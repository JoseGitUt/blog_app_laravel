<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //Register User
    public function register(Request $request)
    {
        //validate fields
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ], 200);
    }
    //Login User
    public function login(Request $request)
    {
        //Validate fields
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        //Attemp login
        if(!Auth::attempt($data))
        {
            return response([
                'message' => 'Invalid credentials'
            ]);
        }
        //Return user and token
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }

    //Logout user
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([ 'message' => 'Logout succes'], 200);
    }

    //Get user detail
    public function user(){
        return response([
            'user' => auth()->user()
        ], 200);
    }

    //Update user
    public function update(Request $request){

        

        $data = $request->validate([
            'name' => 'required|string'
        ]);
        $image = $this->saveImage($request->image, 'profiles');

        auth()->user()->update([
            'name' => $data['name'],
            'image' => $image
        ]);

        return response([
            'user' => auth()->user()
        ], 200);
    }
}
