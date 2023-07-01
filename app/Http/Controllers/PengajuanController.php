<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Sarpras;
use App\Models\Events;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Validation\Rule;

class PengajuanController extends Controller
{
    // tampilkan data
    public function index()
    {
        //get pengajuan
        $pengajuan = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->where('status_pengajuan', '=', '0')
            ->select(
                'pengajuans.*',
                'events.nama_event',
                'events.tgl_mulai',
                'events.id_user',
                'events.tgl_akhir',
                'sarpras.nama_sarpras',
                'users.name'
            )
            ->get();
        // ->paginate(5);

        // $pengajuan = Pengajuan::all();
        $sarprasOptions = Sarpras::pluck('nama_sarpras', 'id');
        $eventOptions = Events::pluck('nama_event', 'id');
        $userOptions = User::pluck('name', 'id');

        //render view with peminjaman
        return view('./admin/pengajuan', [
            'pengajuan' => $pengajuan,
            'sarpras' => $sarprasOptions,
            'events' => $eventOptions,
            'users' => $userOptions,
        ]);
    }

    public function terimaPengajuan(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'id_sarpras' => 'required|exists:sarpras,id',
            'id_event' => 'required|exists:events,id',
        ]);

        // Dapatkan tanggal peminjaman dari pengajuan
        $peminjamanDates = $pengajuan->getPeminjamanDates($validatedData['id_event']);

        // Setel tanggal mulai dan tanggal akhir pada validatedData
        $validatedData['tgl_mulai'] = $peminjamanDates['tgl_peminjaman'];
        $validatedData['tgl_akhir'] = $peminjamanDates['tgl_pengembalian'];

        // Buat objek Peminjaman baru
        $peminjaman = new Pengajuan($validatedData);

        // Validasi ketersediaan sarana pada tanggal yang dipilih
        if (!$peminjaman->isSaranaAvailable(
            $peminjamanDates['tgl_peminjaman'],
            $peminjamanDates['tgl_pengembalian'],
            $validatedData['id_sarpras'],
        )) {
            return back()->withErrors(['Sarana tidak tersedia pada tanggal yang dipilih.']);
        }

        $pengajuan->status_pengajuan = 1;
        $pengajuan->save();

        // Simpan data ke tabel peminjaman
        $peminjaman = new Peminjaman();
        $peminjaman->id_pengajuan = $pengajuan->id;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Pengajuan diterima dan disimpan ke tabel peminjaman.');
    }

    public function tolakPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Ubah status_pengajuan menjadi 2
        $pengajuan->status_pengajuan = 2;
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}
