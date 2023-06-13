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
        // $peminjaman = DB::table('peminjaman')
        //     ->join('users', 'users.id', '=', 'peminjaman.id_user')
        //     ->join('events', 'events.id', '=', 'peminjaman.id_event')
        //     ->join('sarpras', 'sarpras.id', '=', 'peminjaman.id_sarpras')
        //     ->where('peminjaman.status_peminjaman', '=', '1')
        //     ->get();
        // ->paginate(5);
        $pengajuan = Peminjaman::all();
        //render view with peminjaman
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
