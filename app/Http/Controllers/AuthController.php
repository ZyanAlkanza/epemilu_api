<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'nik'       => 'required',
            'password'  => 'required'
        ],[
            'username.required' => 'Kolom ini tidak boleh kosong',
            'nik.required'      => 'Kolom ini tidak boleh kosong',
            'password.required' => 'Kolom ini tidak boleh kosong',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => false,
                'message'       => 'Validasi gagal',
                'error'         => $validator->errors()
            ], 401);
        }

        if(Auth::attempt($request->only(['username', 'nik', 'password']))){
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            return response()->json([
                'status'  => true,
                'message' => 'Login Berhasil',
                'data'    => $user,
                'token'   => $token
            ], 200);
        }

        return response()->json([
            'status'        => false,
            'message'       => 'Login gagal',
        ], 400);
    }

    public function logout()
    {
        $user = Auth::user();

        if ($user) {
            $user->tokens()->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Logout berhasil'
            ], 200);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Logout gagal'
        ], 401);
    }

}
