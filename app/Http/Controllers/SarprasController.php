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
        Sarpras::create([
            'id_kategori' => $request->id_kategori,
            'id_wewenang' => $request->id_wewenang,
            'nama_sarpras' => $request->nama_sarpras,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('admin/sarana');
    }

    // edit
    public function edit($id)
    {
        $data = [
            'sarpras' => Sarpras::find($id),
            'kategori' => KategoriSarpras::all(),
            'wewenang' => Wewenang::all(),
        ];
        
        return view('admin/sarpras.editSarpras', $data);
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
            'jumlah' => $request->jumlah,
        ]);
        return redirect('admin/sarana');
    }

    // hapus
    public function destroy(Sarpras $nama_sarpras)
    {
        $nama_sarpras->delete();
        return redirect('/admin/sarana');
    }
}
