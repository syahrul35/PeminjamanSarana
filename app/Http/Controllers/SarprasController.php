<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriSarpras;
use App\Models\Sarpras;
use App\Models\Wewenang;
use Illuminate\Http\Request;
use App\Http\Controllers\KategoriSarprasController;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

class SarprasController extends Controller
{
    /// tampilkan data
    public function index()
    {
        // join table
        $sarpras = Sarpras::join('wewenangs', 'wewenangs.id', '=', 'sarpras.id_wewenang')->paginate(5);

        //render view with kategori
        return view('./admin/sarpras/kelolaSarpras', compact('sarpras'));
    }

    // tambah sarpras
    public function create(): View
    {
        // get all data foreign key
        $sarpras = KategoriSarpras::all();
        $wewenang = Wewenang::all();

        return view('.admin/sarpras.tambahSarpras', compact('sarpras', 'wewenang'));
    }

    public function store(Request $request)
    {
        // $sarpras = new Sarpras();
        // $sarpras->id_kategori = $request->nama_kategori;
        // $sarpras->id_wewenang = $request->id_wewenang;
        // $sarpras->nama_sarpras = $request->nama_sarpras;
        // $sarpras->jumlah = $request->jumlah;
        // $sarpras->save();

        Sarpras::create([
            'id_kategori' => $request->id_kategori,
            'id_wewenang' => $request->id_wewenang,
            'nama_sarpras' => $request->nama_sarpras,
            'jumlah' => $request->jumlah,
        ]);

        // Sarpras::create($request->all());

        return redirect('admin/kelolaSarpras');
    }

    // edit
    public function edit($id)
    {
        $sarpras = Sarpras::find($id);
        return view('./admin/kelolaSarpras.editSarpras', compact('sarpras'));
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $sarpras = Sarpras::findOrFail($id);

        //update sarpras without image
        $sarpras->update([
            'id_kategori' => $request->id_kategori,
            'id_wewenang' => $request->id_wewenang,
            'nama_sarpras' => $request->nama_sarpras,
            'jumlah' => $request->jumlah,
        ]);
        return redirect()->route('user');
    }

    // hapus
    public function destroy(Sarpras $nama_sarpras)
    {
        $nama_sarpras->delete();
        return redirect('/admin/kelolaSarpras');
    }
}
