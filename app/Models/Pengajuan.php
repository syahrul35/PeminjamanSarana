<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sarpras',
        'id_event',
        'id_user',
        'status_pengajuan'
    ];

    public function sarpras()
    {
        return $this->belongsTo(Sarpras::class, 'id_sarpras');
    }

    public function event()
    {
        return $this->belongsTo(Events::class, 'id_event');
    }
<<<<<<< HEAD
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
