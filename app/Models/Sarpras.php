<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'id_wewenang',
        'nama_sarpras',
    ];

    public function wewenang()
    {
        return $this->belongsTo(Wewenang::class, 'id_wewenang', 'id_user');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    
}
