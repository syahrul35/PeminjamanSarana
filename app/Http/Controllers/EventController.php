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


    // Pilih Sarana

    public function pilihSarpras($id)
    {
        $data = [
            'user' => User::all(),
            'event' => Events::find($id),
            'sarpras' => Sarpras::all(),
        ];

        return view('penyelenggara.pilihSarpras', $data);
    }

    public function buatPengajuan(Request $request)
    {
        // Validasi tanggal
        $tgl_mulai = $request->input('tgl_mulai');
        $tgl_akhir = $request->input('tgl_akhir');
        $id_sarpras = $request->input('id_sarpras');

        $id_user = $request->input('id_user');
        $id_event = $request->input('id_event');

        // $peminjaman = Pengajuan::where('id_sarpras', $id_sarpras)
        //     ->where(function ($query) use ($tgl_mulai, $tgl_akhir) {
        //         $query->whereBetween('tgl_mulai', [$tgl_mulai, $tgl_akhir])
        //             ->orWhereBetween('tgl_akhir', [$tgl_mulai, $tgl_akhir]);
        //     })->first();

        // Cek ketersediaan tanggal
        // $events = Events::whereDate('tgl_mulai', '>=', Carbon::parse($tgl_mulai)->toDateString())
        //     ->whereDate('tgl_akhir', '<=', Carbon::parse($tgl_akhir)->toDateString())
        //     ->get();

        // Cek ketersediaan tanggal
        $events = Events::where(function ($query) use ($tgl_mulai, $tgl_akhir) {
                    $query->where('tgl_mulai', '>=', $tgl_mulai)
                        ->where('tgl_mulai', '<=', $tgl_akhir);
                })->orWhere(function ($query) use ($tgl_mulai, $tgl_akhir) {
                    $query->where('tgl_akhir', '>=', $tgl_mulai)
                        ->where('tgl_akhir', '<=', $tgl_akhir);
                })->orWhere(function ($query) use ($tgl_mulai, $tgl_akhir) {
                    $query->where('tgl_mulai', '<=', $tgl_mulai)
                        ->where('tgl_akhir', '>=', $tgl_akhir);
                })->orWhere(function ($query) use ($tgl_mulai, $tgl_akhir) {
                    $query->where('tgl_mulai', '>=', $tgl_mulai)
                        ->where('tgl_akhir', '<=', $tgl_akhir);
                })->get();

        // Cek ketersediaan tanggal
        if ($events->count() > 0) {
            // Barang tidak dapat dibooking pada tanggal tersebut
            return redirect()->back()->with('error', 'Barang tidak tersedia pada tanggal tersebut.');
        } else {
            // return redirect()->back()->with('success', 'Booking berhasil.');
            Pengajuan::create([
                'id_event' => $request->id_event,
                'id_sarpras' => $request->id_sarpras,
                'id_user' => $request->id_user,
                'status_pengajuan' => $request->status_pengajuan,
            ]);
            return redirect('kelolaEvent');
        }

        // Pengajuan::create([
        //     'id_event' => $request->id_event,
        //     'id_sarpras' => $request->id_sarpras,
        //     'id_user' => $request->id_user,
        // ]);

        // return redirect('kelolaEvent');
    }
}
