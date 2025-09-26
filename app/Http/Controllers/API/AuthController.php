<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'nama_lengkap'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'kata_sandi'=>'required|string|min:8|confirmed',
        ]);

        if($validate->fails()){
            return response()->json([
                'success'=> false,
                'error'=> $validate->errors(),
            ] ,403);
        }

        $user = User::create([
            'nama_lengkap'=>$request->nama_lengkap,
            'email'=>$request->email,
            'kata_sandi'=> Hash::make($request->kata_sandi),
        ]);

        return response()->json([
            'success'=>true,
            'data'=> [
                'user'=>$user,
            ],
            'message'=>'User berhasil didaftarkan!',
        ] ,201);
    }


    public function login(Request $request){
        $validate = Validator::make($request->all(), [
            'email'=>'required|string|email|max:255',
            'kata_sandi'=>'required|string|min:8',
        ]);

        if($validate->fails()){
            return response()->json([
                'success'=> false,
                'error'=> $validate->errors(),
            ] ,403);
        }

        $user = User::where('email',$request->email)->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([  
            'success'=>true,
            'data'=> [
                'user'=>$user,
                'access_token'=>$token,
                'token_type'=>'Bearer'
            ],
            'message'=>'Anda berhasil login!',
        ], );
    }

    public function logout(Request $request){   
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=>true,
            'message'=> 'Logout Berhasil'
        ],200);
    }
}
