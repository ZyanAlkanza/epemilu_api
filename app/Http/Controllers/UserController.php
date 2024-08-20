<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nik'               => 'required',
            'username'          => 'required',
            'place_of_birth'    => 'required',
            'date_of_birth'     => 'required',
            'religion'          => 'required',
            'address'           => 'required',
            'rt'                => 'required',
            'rw'                => 'required',
            'village'           => 'required',
            'subdistrict'       => 'required',
            'city'              => 'required',
            'province'          => 'required',
            'job'               => 'required',
            'gender'            => 'required',
            'blood_type'        => 'required',
            'password'          => 'required'
        ],[
            'nik.required'               => 'Kolom wajib diisi',
            'username.required'          => 'Kolom wajib diisi',
            'place_of_birth.required'    => 'Kolom wajib diisi',
            'date_of_birth.required'     => 'Kolom wajib diisi',
            'religion.required'          => 'Kolom wajib diisi',
            'address.required'           => 'Kolom wajib diisi',
            'rt.required'                => 'Kolom wajib diisi',
            'rw.required'                => 'Kolom wajib diisi',
            'village.required'           => 'Kolom wajib diisi',
            'subdistrict.required'       => 'Kolom wajib diisi',
            'city.required'              => 'Kolom wajib diisi',
            'province.required'          => 'Kolom wajib diisi',
            'job.required'               => 'Kolom wajib diisi',
            'gender.required'            => 'Kolom wajib diisi',
            'blood_type.required'        => 'Kolom wajib diisi',
            'password.required'          => 'Kolom wajib diisi'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Validasi gagal',
                'error'     => $validator->errors()
            ], 400);
        }

        $data = User::create([
            'nik'               => $request->nik,
            'username'          => $request->username,
            'place_of_birth'    => $request->place_of_birth,
            'date_of_birth'     => $request->date_of_birth,
            'religion'          => $request->religion,
            'address'           => $request->address,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
            'village'           => $request->village,
            'subdistrict'       => $request->subdistrict,
            'city'              => $request->city,
            'province'          => $request->province,
            'job'               => $request->job,
            'gender'            => $request->gender,
            'blood_type'        => $request->blood_type,
            'role'              => 2,
            'password'          => Hash::make($request->password),
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Data berhasil ditambahkan',
            'data'      => $data
        ], 200);
    }

    public function show($id)
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nik'               => ['required', Rule::unique('users')->ignore($request->id)],
            'username'          => 'required',
            'place_of_birth'    => 'required',
            'date_of_birth'     => 'required',
            'religion'          => 'required',
            'address'           => 'required',
            'rt'                => 'required',
            'rw'                => 'required',
            'village'           => 'required',
            'subdistrict'       => 'required',
            'city'              => 'required',
            'province'          => 'required',
            'job'               => 'required',
            'gender'            => 'required',
            'blood_type'        => 'required',
        ],[
            'nik.required'               => 'Kolom wajib diisi',
            'username.required'          => 'Kolom wajib diisi',
            'place_of_birth.required'    => 'Kolom wajib diisi',
            'date_of_birth.required'     => 'Kolom wajib diisi',
            'religion.required'          => 'Kolom wajib diisi',
            'address.required'           => 'Kolom wajib diisi',
            'rt.required'                => 'Kolom wajib diisi',
            'rw.required'                => 'Kolom wajib diisi',
            'village.required'           => 'Kolom wajib diisi',
            'subdistrict.required'       => 'Kolom wajib diisi',
            'city.required'              => 'Kolom wajib diisi',
            'province.required'          => 'Kolom wajib diisi',
            'job.required'               => 'Kolom wajib diisi',
            'gender.required'            => 'Kolom wajib diisi',
            'blood_type.required'        => 'Kolom wajib diisi',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Validasi gagal',
                'error'     => $validator->errors()
            ], 400);
        }

        $user = User::where('id', $request->id)->first();

        if(!$user){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }else{
            $data = $user->update([
                'nik'               => $request->nik,
                'username'          => $request->username,
                'place_of_birth'    => $request->place_of_birth,
                'date_of_birth'     => $request->date_of_birth,
                'religion'          => $request->religion,
                'address'           => $request->address,
                'rt'                => $request->rt,
                'rw'                => $request->rw,
                'village'           => $request->village,
                'subdistrict'       => $request->subdistrict,
                'city'              => $request->city,
                'province'          => $request->province,
                'job'               => $request->job,
                'gender'            => $request->gender,
                'blood_type'        => $request->blood_type,
            ]);

            return response()->json([
                'status'    => true,
                'message'   => 'Data berhasil ditambahkan',
                'data'      => $data
            ], 200);
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id);

        if(!$user){
            return response()->json([
                'status'    => false,
                'message'   => 'Data tidak ditemukan'
            ], 404);
        }else{
            $user->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Data berhasil dihapus'
            ], 200);
        }
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
