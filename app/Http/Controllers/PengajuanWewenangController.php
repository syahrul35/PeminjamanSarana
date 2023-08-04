<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengajuanWewenangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id_user')
            
            ->where('status_pengajuan', '=', '1')
            ->where('wewenangs.id_user', Auth::user()->id)
            ->select(
                'pengajuans.*',
                'events.nama_event',
                'events.tgl_mulai',
                'events.id_user',
                'sarpras.nama_sarpras',
                'users.name'
            )
            ->get();

            return view('./wewenang/pengajuan/kelolaPengajuan', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    public function terimaPengajuanWewenang(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // simpan data pengajuan
        $pengajuan->status_pengajuan = '2';
        $pengajuan->save();

        // simpan data peminjaman
        $peminjaman = new Peminjaman();
        $peminjaman->id_pengajuan = $pengajuan->id;
        $peminjaman->tgl_peminjaman = $request->tgl_peminjaman;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Pengajuan Diterima.');
    }

    public function tolakPengajuanWewenang($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Ubah status_pengajuan menjadi 3
        $pengajuan->status_pengajuan = '3';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
