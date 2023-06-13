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
            ->where('pengajuans.id_user', '=', Auth::user()->id)
            ->select('pengajuans.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras')
            ->get();

        return view('penyelenggara.dashboardPenyelenggara', compact('pengajuan'));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        // $data = [
        //     'event' => Events::all(),
        //     'peminjaman' => Peminjaman::all(),
        // ];

        // $pengajuan = Pengajuan::all();
        $peminjaman = Peminjaman::all();

        $pengajuan = DB::table('pengajuans')
            ->join('users', 'pengajuans.id_user', '=', 'users.id')
            ->join('events', 'pengajuans.id_event', '=', 'events.id')
            ->join('sarpras', 'pengajuans.id_sarpras', '=', 'sarpras.id')
            ->select('pengajuans.*', 'events.nama_event', 'events.tgl_mulai', 'events.id_user', 'events.tgl_akhir', 'sarpras.nama_sarpras', 'users.name')
            ->get();

        return view('admin/dashboardAdmin', compact('pengajuan', 'peminjaman'));

        // return view('admin/dashboardAdmin', $data);
    }

    public function kelolaPenyelenggara()
    {
        // $this->authorize('admin');
        $user = user::where('type', '0')->paginate(5);
        return view('./admin/penyelenggara/kelolaPenyelenggara', compact('user'));
    }

    public function wewenang()
    {
        // $this->authorize('admin');
        //get kategori
        $wewenang = Wewenang::latest()->paginate(5);

        //render view with kategori
        return view('./admin/wewenang/wewenang', compact('wewenang'));
    }

    public function kategoriSarana()
    {
        // $this->authorize('admin');
        //get kategori
        $kategori = KategoriSarpras::latest()->paginate(5);

        //render view with kategori
        return view('./admin/kategori/kategoriSarana', compact('kategori'));
    }

    public function kelolaSarana()
    {
        // $this->authorize('admin');
        // join table
        // $sarpras = Sarpras::join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id')->paginate(5);

        $sarpras = DB::table('sarpras')
            ->join('wewenangs', 'sarpras.id_wewenang', '=', 'wewenangs.id')
            ->select('sarpras.*', 'wewenangs.nama_wewenang', 'wewenangs.telp_wewenang')
            ->get();

        //render view with kategori
        return view('./admin/sarpras/kelolaSarpras', compact('sarpras'));
    }

    public function kelolaPengajuan()
    {
        // $this->authorize('admin');
        //get kategori
        // $pengajuan = DB::table('pengajuan')
        //     ->join('users', 'users.id', '=', 'peminjaman.id_user')
        //     ->join('events', 'events.id', '=', 'peminjaman.id_event')
        //     ->join('sarpras', 'sarpras.id', '=', 'peminjaman.id_sarpras')
        //     ->where('peminjaman.status_peminjaman', '=', '0')
        //     ->get();
        // ->paginate(5);

        $pengajuan = Pengajuan::all();

        //render view with peminjaman
        return view('./admin/pengajuan', compact('pengajuan'));
    }

    public function kelolaPeminjaman()
    {
        // $this->authorize('admin');
        //get kategori
        // $peminjaman = DB::table('peminjaman')
        //     ->join('users', 'users.id', '=', 'peminjaman.id_user')
        //     ->join('events', 'events.id', '=', 'peminjaman.id_event')
        //     ->join('sarpras', 'sarpras.id', '=', 'peminjaman.id_sarpras')
        //     ->where('peminjaman.status_peminjaman', '=', '1')
        //     ->get();
        // ->paginate(5);

        $peminjaman = Peminjaman::all();

        //render view with peminjaman
        return view('./admin/peminjaman', compact('peminjaman'));
    }

    public function bandingkanEvent()
    {
        
        return view('bandingkanEvent');
    }
}
