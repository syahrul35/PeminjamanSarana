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

    public function sarana()
    {
        return $this->belongsTo(Sarpras::class, 'id_sarpras');
    }

    public function event()
    {
        return $this->belongsTo(Events::class, 'id_event');
    }

    public function isSaranaAvailable($tglPeminjaman, $tglPengembalian, $idSarana)
    {
        // dd($tglPeminjaman, $tglPengembalian, $idSarana);
        return !$this->where('id_sarpras', $idSarana)
        ->where(function ($query) use ($tglPeminjaman, $tglPengembalian) {
            $query->where(function ($query) use ($tglPeminjaman, $tglPengembalian) {
                $query->where(function ($query) use ($tglPeminjaman, $tglPengembalian) {
                    $query->where('tgl_peminjaman', '>=', $tglPeminjaman)
                        ->where('tgl_peminjaman', '<', $tglPengembalian);
                })
                ->orWhere(function ($query) use ($tglPeminjaman, $tglPengembalian) {
                    $query->where('tgl_pengembalian', '>', $tglPeminjaman)
                        ->where('tgl_pengembalian', '<=', $tglPengembalian);
                });
            })
            ->orWhere(function ($query) use ($tglPeminjaman, $tglPengembalian) {
                $query->where('tgl_peminjaman', '<=', $tglPeminjaman)
                    ->where('tgl_pengembalian', '>=', $tglPengembalian);
            });
        })
        ->exists();

    }


    public static function getPeminjamanDates($id)
    {
        $event = Events::findOrFail($id);

        return [
            'tgl_peminjaman' => $event->tgl_mulai,
            'tgl_pengembalian' => $event->tgl_akhir,
        ];
    }

    // public function isSaranaAvailable($tglPeminjaman, $tglPengembalian, $idSarana)
    // {
    //     $tglPeminjaman = date('Y-m-d H:i:s', strtotime($tglPeminjaman));
    //     $tglPengembalian = date('Y-m-d H:i:s', strtotime($tglPengembalian));
    
    //     $existingBooking = $this->where('id_sarpras', $idSarana)
    //         ->where(function ($query) use ($tglPeminjaman, $tglPengembalian) {
    //             $query->where(function ($query) use ($tglPeminjaman, $tglPengembalian) {
    //                 $query->where('tgl_peminjaman', '<=', $tglPengembalian)
    //                     ->where('tgl_pengembalian', '>=', $tglPeminjaman);
    //             })
    //             ->orWhere(function ($query) use ($tglPeminjaman, $tglPengembalian) {
    //                 $query->where('tgl_peminjaman', '>=', $tglPeminjaman)
    //                     ->where('tgl_pengembalian', '<=', $tglPengembalian);
    //             });
    //         })
    //         ->where('id', '<>', $this->id) // Exclude the current Pengajuan
    //         ->exists();
    
    //     return !$existingBooking;
    // }
   
    // public function getPeminjamanDates()
    // {
    //     return [
    //         'tgl_peminjaman' => $this->tgl_mulai,
    //         'tgl_pengembalian' => $this->tgl_akhir,
    //     ];
    // }

}
