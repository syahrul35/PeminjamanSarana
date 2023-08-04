<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use Carbon\Carbon;
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
            // Get pengajuan
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
                'sarpras.nama_sarpras',
                'users.name'
            )
            ->get();

            $prevTgl = null;

            foreach ($pengajuan as $key => $item) {
                $tglMulai = \Carbon\Carbon::parse($item->tgl_mulai);
        
                if ($key > 0 && $tglMulai->isSameDay(\Carbon\Carbon::parse($pengajuan[$key-1]->tgl_mulai))) {
                    $item->isSameDay = true;
                } else {
                    $item->isSameDay = false;
                }
        
                $prevTgl = $tglMulai;
            }

        return view('./admin/pengajuan', compact('pengajuan'));
    }

    public function terimaPengajuan(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $request->validate([
            'tgl_peminjaman' => [
                'required',
                function ($attribute, $value, $fail) use ($id, $request) {
                    $pengajuan = Pengajuan::findOrFail($id);
                    $idSarpras = $pengajuan->id_sarpras;

                    $existingPengajuanPeminjaman = Peminjaman::where('id_pengajuan', $id)
                        ->where('tgl_peminjaman', $value)
                        ->exists();

                    if ($existingPengajuanPeminjaman) {
                        $fail('tgl peminjaman bentrok dengan peminjaman pada pengajuan ini.');
                    }

                    $existingPeminjaman = Peminjaman::join('pengajuans', 'peminjaman.id_pengajuan', '=', 'pengajuans.id')
                        ->where('peminjaman.tgl_peminjaman', $value)
                        ->where('pengajuans.id_sarpras', $idSarpras)
                        ->exists();

                    if ($existingPeminjaman) {
                        $fail('Tanggal peminjaman bentrok dengan peminjaman yang ada.');
                    }
                },
            ],
        ]);

        // Simpan data peminjaman jika valid
        // $peminjaman = new Peminjaman();
        // $peminjaman->id_pengajuan = $pengajuan->id;
        // $peminjaman->tgl_peminjaman = $request->tgl_peminjaman;
        // $peminjaman->save();

        // Update status_peminjaman di tabel pengajuan
        $pengajuan->status_pengajuan = '1';
        $pengajuan->save();

        // penyimpanan berhasil
        return redirect()->back()->with('success', 'Pengajuan Diterima.');
    }
    

    public function tolakPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Ubah status_pengajuan menjadi 2
        $pengajuan->status_pengajuan = '3';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}
