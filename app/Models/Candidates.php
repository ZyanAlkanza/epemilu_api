<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut',
        'nama_presiden',
        'nama_wakil',
        'periode'
    ];
}
