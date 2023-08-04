<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $dates = ['tgl_mulai'];

    protected $fillable = [
        'id_user',
        'nama_event',
        'tgl_mulai',
        'jumlah_peserta',
        'pemateri',
        'nilai_pemateri',
        'undangan',
        'nilai_undangan',
        'biaya_pengeluaran',
        'biaya_pendapatan',
    ];

    public static function getEventById($id)
    {
        return self::findOrFail($id);
    }
}
