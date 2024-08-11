<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'pekerjaan',
        'jenis_kelamin',
        'golongan_darah',
        'sandi',
    ];

    protected $hidden = [
        'sandi',
    ];

    protected $casts = [
        'sandi' => 'hased',
    ];
}
