<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use App\Models\Sarpras;
use App\Models\Pengajuan;

class PilihSarprasController extends Controller
{
    public function index($id)
    {
        $data = [
            'user' => User::all(),
            'event' => Events::find($id),
            'sarpras' => Sarpras::all(),
        ];

        return view('penyelenggara.pilihSarpras', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_sarpras' => 'required|exists:sarpras,id',
            'id_event' => 'required|exists:events,id',
            'id_user' => 'required|exists:users,id',
        ]);

        $peminjamanDates = Pengajuan::getPeminjamanDates($validatedData['id_event']);

        $validatedData['tgl_mulai'] = $peminjamanDates['tgl_peminjaman'];
        $validatedData['tgl_akhir'] = $peminjamanDates['tgl_pengembalian'];

        $peminjaman = new Pengajuan($validatedData);

        if (!$peminjaman->isSaranaAvailable(
            $peminjamanDates['tgl_peminjaman'],
            $peminjamanDates['tgl_pengembalian'],
            // $request->id_user,
            $request->id_sarpras,
            // $request->id_event,
            // $request->status_pengajuan,
        )) {
            return back()->withErrors(['Sarana tidak tersedia pada tanggal yang dipilih.']);
        }

        $peminjaman->status_pengajuan = '0';
        $peminjaman->save();

        return redirect()->route('kelolaEvent')->with('success', 'Peminjaman berhasil dibuat.');
    }
}
