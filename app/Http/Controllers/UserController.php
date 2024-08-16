<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        
        return response()->json([
            'status'    => true,
            'message'   => 'Data berhasil ditampilkan',
            'data'      => $data
        ], 200);
    }

    public function user($id)
    {
        $data = User::where('id', $id)->first();

        if(!$data){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Data berhasil ditampilkan',
            'data'      => $data
        ], 200);
    }
}
