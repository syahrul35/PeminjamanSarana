<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PengajuanController extends Controller
{
    // tampilkan data
    public function index()
    {
        //get kategori
        $pengajuan = DB::table('peminjaman')
            ->join('users', 'users.id', '=', 'peminjaman.id_user')
            ->join('events', 'events.id', '=', 'peminjaman.id_event')
            ->join('sarpras', 'sarpras.id', '=', 'peminjaman.id_sarpras')
            ->where('peminjaman.status_peminjaman', '=', '0')
            ->get();
        // ->paginate(5);

        //render view with peminjaman
        return view('./admin/pengajuan', compact('pengajuan'));
    }

    public function destroy($id): RedirectResponse
        {
            //get pengajuan by ID
            $pengajuan = Peminjaman::findOrFail($id);
    
            //delete peminjaman
            $pengajuan->delete();
    
            //redirect to index
            return redirect()->route('./admin/pengajuan');
        }
}
