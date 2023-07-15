<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Wewenang;
use App\Models\KategoriSarpras;
use App\Models\Sarpras;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajuan = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id')
            ->where('pengajuans.id_user', '=', Auth::user()->id)
            ->select('pengajuans.*', 'events.nama_event', 'events.id_user', 'sarpras.nama_sarpras',
            'wewenangs.nama_wewenang', 'wewenangs.telp_wewenang')
            ->get();

        return view('penyelenggara.dashboardPenyelenggara', compact('pengajuan'));
    }

    public function cetak($id)
    {

        $results = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->where('pengajuans.id', '=', $id)
            ->select('pengajuans.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user',
             'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
            ->get();

        // $results = Pengajuan::find($id);
        $pdf = PDF::loadView('penyelenggara.contohSurat', compact('results'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $pengajuans = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->where('status_pengajuan', '=', '0')
            ->select('pengajuans.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
            ->latest()->paginate(3);

        $peminjaman = DB::table('peminjaman')
            ->join('pengajuans', 'peminjaman.id_pengajuan', '=', 'pengajuans.id')
            ->join('users', 'users.id', '=', 'pengajuans.id_user')
            ->join('events', 'events.id', '=', 'pengajuans.id_event')
            ->join('sarpras', 'sarpras.id', '=', 'pengajuans.id_sarpras')
            // ->where('peminjaman.status_peminjaman', '=', '0')
            ->select('peminjaman.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
            ->latest()->paginate(3);

        return view('admin/dashboardAdmin', compact('pengajuans', 'peminjaman'));

        // return view('admin/dashboardAdmin', $data);
    }

    public function kelolaPenyelenggara()
    {
        // $this->authorize('admin');
        $user = user::where('type', '0')->get();
        return view('./admin/penyelenggara/kelolaPenyelenggara', compact('user'));
    }

    public function wewenang()
    {
        //get kategori
        $wewenang = Wewenang::all();

        //render view with kategori
        return view('./admin/wewenang/wewenang', compact('wewenang'));
    }

    public function kategoriSarana()
    {
        //get kategori
        $kategori = KategoriSarpras::all();

        //render view with kategori
        return view('./admin/kategori/kategoriSarana', compact('kategori'));
    }

    public function kelolaSarana()
    {
        $sarpras = DB::table('sarpras')
            ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id')
            ->select('sarpras.*', 'wewenangs.nama_wewenang', 'wewenangs.telp_wewenang')
            ->get();

        //render view with kategori
        return view('./admin/sarpras/kelolaSarpras', compact('sarpras'));
    }

    public function kelolaPengajuan()
    {
        $pengajuan = Pengajuan::all();

        //render view with peminjaman
        return view('./admin/pengajuan', compact('pengajuan'));
    }

    public function kelolaPeminjaman()
    {
        $peminjaman = Peminjaman::all();

        //render view with peminjaman
        return view('./admin/peminjaman', compact('peminjaman'));
    }

    public function bandingkanEvent()
    {
        
        return view('bandingkanEvent');
    }
}
