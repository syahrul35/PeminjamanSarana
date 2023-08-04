<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            // ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id_user')
            // ->where('wewenangs.id_user', Auth::user()->id)
            ->select('peminjaman.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'sarpras.nama_sarpras', 'users.name')
            ->get();
        // ->paginate(5);
        
        return view('./admin/peminjaman', compact('peminjaman'));
    }

    public function terimaPengembalian($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status_peminjaman = 1;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Sarana Telah Dikembalikan!');
    }
}
