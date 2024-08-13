<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voters')->insert([
            'nik'       => 3216061801990001,
            'username'  => 'zyan mujaddid alkanza',
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
            'password'  => Hash::make('123'),
        ]);
    }
}
