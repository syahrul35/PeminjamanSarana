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
        Pengajuan::create([
            'id_event' => $request->id_event,
            'id_sarpras' => $request->id_sarpras,
            'id_user' => $request->id_user,
            // 'tgl_peminjaman' => $request->tgl_peminjaman,
            // 'tgl_pengembalian' => $request->tgl_pengembalian,
            'status_pengajuan' => $request->status_pengajuan,
        ]);
        return redirect('/');
    }
}
