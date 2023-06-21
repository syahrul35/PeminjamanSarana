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
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status_pengajuan'
    ];

    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'id_sarpras');
    }

    public function event()
    {
        return $this->belongsTo(Events::class, 'id_event');
    }

    public function isSaranaAvailable($tglPeminjaman, $tglPengembalian, $idSarana)
    {
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

    public static function getPeminjamanDates($eventId)
    {
        $event = Events::findOrFail($eventId);

        return [
            'tgl_peminjaman' => $event->tgl_mulai,
            'tgl_pengembalian' => $event->tgl_akhir,
        ];
    }
}
