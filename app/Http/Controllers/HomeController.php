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
        return view('penyelenggara.dashboardPenyelenggara');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        // $this->authorize('admin');
        return view('admin/dashboardAdmin');
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
        $sarpras = Sarpras::join('wewenangs', 'wewenangs.id', '=', 'sarpras.id_wewenang')->paginate(5);

        //render view with kategori
        return view('./admin/sarpras/kelolaSarpras', compact('sarpras'));
    }

    public function kelolaPengajuan()
    {
        // $this->authorize('admin');
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

    public function kelolaPeminjaman()
    {
        // $this->authorize('admin');
        //get kategori
        $peminjaman = DB::table('peminjaman')
            ->join('users', 'users.id', '=', 'peminjaman.id_user')
            ->join('events', 'events.id', '=', 'peminjaman.id_event')
            ->join('sarpras', 'sarpras.id', '=', 'peminjaman.id_sarpras')
            ->where('peminjaman.status_peminjaman', '=', '1')
            ->get();
        // ->paginate(5);

        //render view with peminjaman
        return view('./admin/peminjaman', compact('peminjaman'));
    }

    public function bandingkanEvent()
    {
        return view('bandingkanEvent');
    }
}
