<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanWewenangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get kategori
        $peminjaman = DB::table('peminjaman')
            ->join('pengajuans', 'peminjaman.id_pengajuan', '=', 'pengajuans.id')
            ->join('users', 'users.id', '=', 'pengajuans.id_user')
            ->join('events', 'events.id', '=', 'pengajuans.id_event')
            ->join('sarpras', 'sarpras.id', '=', 'pengajuans.id_sarpras')
            ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id_user')
            // ->where('peminjaman.status_peminjaman', '=', '0')
            ->where('wewenangs.id_user', Auth::user()->id)
            ->select('peminjaman.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'sarpras.nama_sarpras', 'users.name')
            ->get();
        // ->paginate(5);
        
        return view('./wewenang/peminjaman/kelolaPeminjaman', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
