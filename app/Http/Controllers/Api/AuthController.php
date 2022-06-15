<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials'],401);
        }



        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json([
            "status" => true,
            "message" => "Customer Logged Successfully",
            "user"=>auth()->user(),
            "token" => $accessToken
        ],200);
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'status'=>true,
            'message'=>'Registration Successful',
            'user'=>$user,
            'accessToken'=>$accessToken
        ],200);
    }


    public function profile(){
        $user_data = auth()->user();
        if($user_data){
            return response()->json([
                'status'=>true,
                'message'=>'User Data',
                'data'=>$user_data
            ],200);
        }else{
            return  response()->json([
               'message'=>'U dont have access'
            ],401);
        }


    }

    public function logout(Request $request){

        $token = $request->user()->token();

//        revoke this token
        $token->revoke();

        return response()->json([
            'status'=>true,
            'message'=>"User Logged Out Successfully"
        ],200);
    }
}
