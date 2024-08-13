<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $voter = Voter::where('nik', $request->nik)->first();

        if($voter && Hash::check($request->password, $voter->password ) && $voter->username == $request->username ){
            Auth::login($voter);
            return response()->json([
                'status'        => true,
                'message'       => 'Login berhasil, Selamat datang pemilih!',
                'data'          => $voter
            ], 200);
        }

        $user = User::where('nik', $request->nik)->first();

        if($user && Hash::check($request->password, $user->password) && $user->username == $request->username){
            Auth::login($user);
            return response()->json([
                'status'        => true,
                'message'       => 'Login berhasil, Selamat datang admin!',
                'data'          => $user
            ], 200);
        }

        return response()->json([
            'status'        => false,
            'message'       => 'Login gagal',
        ], 400);
    }
}
