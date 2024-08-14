<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nik'       => 3216061801990000,
            'username'  => 'admin',
            'place_of_birth'    => 'bekasi',
            'date_of_birth'     => '1999-01-18',
            'religion'  => 'islam',
            'address'   => 'puri kencana blok d7',
            'rt'        => '009',
            'rw'        => '018',
            'village'   => 'pengasinan',
            'subdistrict'       => 'rawalumbu',
            'city'      => 'kota bekasi',
            'province'  => 'jawa barat',
            'job'       => 'mahasiswa',
            'gender'    => 'l',
            'blood_type'        => 'b',
            'role'      => 1,
            'password'  => Hash::make('123'),
        ]);
    }
}
