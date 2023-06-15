<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
        ->select('pengajuans.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
        ->get();
        // ->paginate(5);

        // $pengajuan = Pengajuan::all();

        //render view with peminjaman
        return view('./admin/pengajuan', compact('pengajuan'));
    }

    public function destroy($id): RedirectResponse
    {
        //get pengajuan by ID
        $pengajuan = Pengajuan::findOrFail($id);

        //delete peminjaman
        $pengajuan->delete();

        //redirect to index
        return redirect()->route('./admin/pengajuan');
    }
}
