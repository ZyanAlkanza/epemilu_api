<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'username',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'address',
        'rt',
        'rw',
        'village',
        'subdistrict',
        'city',
        'province',
        'job',
        'gender',
        'blood_type',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hased',
    ];
}
