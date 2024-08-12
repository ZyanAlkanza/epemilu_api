<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

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

        if(Auth::attempt($request->only('username', 'nik', 'password'))){
            $user = Auth::user();
            return response()->json([
                'status'        => true,
                'message'       => 'Login berhasil',
                'data'          => $user
            ], 200);
        }else{
            return response()->json([
                'status'        => false,
                'message'       => 'Login gagal',
            ], 400);
        }
    }
}
