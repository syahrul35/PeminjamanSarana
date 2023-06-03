<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_event',
        'tgl_mulai',
        'tgl_akhir',
        'jumlah_peserta',
        'pemateri',
        'undangan',
        'biaya_pengeluaran',
        'biaya_pemasukan',
    ];

    // public function get()
    // {
    //     return $this->belongsTo('App\\User', 'id');
    // }
}
