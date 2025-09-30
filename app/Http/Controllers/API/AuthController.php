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
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'kata_sandi' => 'required|string|min:8|confirmed',
        'telepon' => 'required|string|max:15',
        'nik' => 'required|string|size:16|unique:users',
        'umur' => 'required|integer|min:1|max:120',
        'jenis_kelamin' => 'required|string|max:255',
        'pendidikan' => 'required|string|max:255',
        'profesi' => 'required|string|max:255',
        'keahlian' => 'required|string|max:255',
        'status_perkawinan' => 'required|string',
        'jumlah_anggota_keluarga' => 'required|integer|min:1',
        'province_id' => 'required|integer',
        'regency_id' => 'required|integer'
    ]);

    if($validate->fails()){
        return response()->json([
            'success' => false,
            'error' => $validate->errors(),
        ], 422); // Changed from 403 to 422 for validation errors
    }

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'kata_sandi' => Hash::make($request->kata_sandi),
        'telepon' => $request->telepon,
        'role' => 'user', // Default role
        'nik' => $request->nik,
        'umur' => $request->umur,
        'jenis_kelamin' => $request->jenis_kelamin,
        'pendidikan' => $request->pendidikan,
        'profesi' => $request->profesi,
        'keahlian' => $request->keahlian,
        'status_perkawinan' => $request->status_perkawinan,
        'jumlah_anggota_keluarga' => $request->jumlah_anggota_keluarga,
        'province_id' => $request->province_id,
        'regency_id' => $request->regency_id,
    ]);

    return response()->json([
        'success' => true,
        'data' => [
            'user' => $user,
        ],
        'message' => 'User berhasil didaftarkan!',
    ], 201);
}

    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user(), // otomatis ambil user dari token Sanctum
        ], 200);
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
