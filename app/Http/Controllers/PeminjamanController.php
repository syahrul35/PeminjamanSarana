<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    // tampilkan data
    public function index()
    {
        //get kategori
        $peminjaman = DB::table('peminjaman')
            ->join('pengajuans', 'peminjaman.id_pengajuan', '=', 'pengajuans.id')
            ->join('users', 'users.id', '=', 'pengajuans.id_user')
            ->join('events', 'events.id', '=', 'pengajuans.id_event')
            ->join('sarpras', 'sarpras.id', '=', 'pengajuans.id_sarpras')
            // ->where('peminjaman.status_peminjaman', '=', '0')
            ->select('peminjaman.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
            ->get();
        // ->paginate(5);
        
        return view('./admin/peminjaman', compact('peminjaman'));
    }

    public function destroy($id): RedirectResponse
    {
        //get pengajuan by ID
        $peminjaman = Peminjaman::findOrFail($id);

        //delete peminjaman
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('./admin/peminjaman');
    }
}
