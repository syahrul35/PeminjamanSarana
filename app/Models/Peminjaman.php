<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['pengajuan_id'];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
