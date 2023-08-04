<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wewenang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'jabatan_wewenang',
        'telp_wewenang',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function sarpras()
    {
        return $this->hasMany(Sarpras::class);
    }
}
