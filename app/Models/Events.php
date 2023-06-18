<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'id_user',
        'nama_event',
        'tgl_mulai',
        'tgl_akhir',
        'jumlah_peserta',
        'pemateri',
        'undangan',
        'biaya_pengeluaran',
        'biaya_pendapatan',
    ];

    public static function getEventById($id)
    {
        return self::findOrFail($id);
    }

    // public function get()
    // {
    //     return $this->belongsTo('App\\User', 'id');
    // }
}
