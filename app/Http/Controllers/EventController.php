<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Sarpras;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $event = Events::all()->where('id_user', '=', Auth::user()->id);

        return view('penyelenggara.kelolaEvent', compact('event'));
    }

    public function create()
    {
        return view('.penyelenggara/tambahEvent');
    }

    public function store(Request $request)
    {
        Events::create([
            'id_user' => $request->id_user,
            'nama_event' => $request->nama_event,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'jumlah_peserta' => $request->jumlah_peserta,
            'pemateri' => $request->pemateri,
            'undangan' => $request->undangan,
            'biaya_pengeluaran' => $request->biaya_pengeluaran,
            'biaya_pendapatan' => $request->biaya_pendapatan,
        ]);

        // Sarpras::create($request->all());

        return redirect('kelolaEvent');
    }

    // edit
    public function edit($id)
    {
        $data = [
            'event' => Events::find($id),
        ];
        return view('penyelenggara/editEvent', $data);
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $event = Events::findOrFail($id);

        //update event
        $event->update([
            'id_user' => $request->id_user,
            'nama_event' => $request->nama_event,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'jumlah_peserta' => $request->jumlah_peserta,
            'pemateri' => $request->pemateri,
            'undangan' => $request->undangan,
            'biaya_pengeluaran' => $request->biaya_pengeluaran,
            'biaya_pendapatan' => $request->biaya_pendapatan,
        ]);
        return redirect('/kelolaEvent');
    }

    // hapus
    public function destroy(Events $event)
    {
        $event->delete();
        return redirect('/kelolaEvent');
    }
}
