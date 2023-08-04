<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriSarpras;
use App\Models\Sarpras;
use App\Models\Wewenang;
use Illuminate\Http\Request;
use App\Http\Controllers\KategoriSarprasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

class SarprasController extends Controller
{
    /// tampilkan data
    public function index()
    {
        // $sarpras = Sarpras::all()->where('id_wewenang', Auth::user()->id);
        $sarpras = DB::table('sarpras')
        ->join('wewenangs', 'wewenangs.id_user', '=', 'sarpras.id_wewenang')
        ->join('users', 'users.id', '=', 'wewenangs.id_user')
        ->where('wewenangs.id_user', Auth::user()->id)
        ->select('sarpras.*', 'wewenangs.telp_wewenang', 'users.name')
        ->get();
        
        //render view with kategori
        return view('./wewenang/sarpras/kelolaSarpras', compact('sarpras'));
    }

    // tambah sarpras
    public function create(): View
    {
        // get all data foreign key
        $sarpras = KategoriSarpras::all();
        $wewenang = Wewenang::all();

        return view('.wewenang/sarpras.tambahSarpras', compact('sarpras', 'wewenang'));
    }

    public function store(Request $request)
    {
        Sarpras::create([
            'id_kategori' => $request->id_kategori,
            'id_wewenang' => $request->id_wewenang,
            'nama_sarpras' => $request->nama_sarpras,
        ]);

        return redirect('wewenang/sarana');
    }

    // edit
    public function edit($id)
    {
        $data = [
            'sarpras' => Sarpras::find($id),
            'kategori' => KategoriSarpras::all(),
            'wewenang' => Wewenang::all(),
        ];
        
        return view('wewenang/sarpras.editSarpras', $data);
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $sarpras = Sarpras::findOrFail($id);

        //update sarpras 
        $sarpras->update([
            'id_kategori' => $request->id_kategori,
            'id_wewenang' => $request->id_wewenang,
            'nama_sarpras' => $request->nama_sarpras,
        ]);
        return redirect('wewenang/sarana');
    }

    // hapus
    public function destroy(Sarpras $nama_sarpras)
    {
        $nama_sarpras->delete();
        return redirect('/wewenang/sarana');
    }
}
