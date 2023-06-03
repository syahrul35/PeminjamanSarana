<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wewenang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_wewenang',
        'jabatan_wewenang',
        'telp_wewenang',
    ];
}
