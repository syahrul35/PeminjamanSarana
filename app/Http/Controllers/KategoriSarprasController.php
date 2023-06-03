<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriSarpras;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KategoriSarprasController extends Controller
{
    // tampilkan data
    public function index()
    {
        $this->authorize('admin');
        //get kategori
        $kategori = KategoriSarpras::latest()->paginate(5);

        //render view with kategori
        return view('./admin/kategori/kategoriSarana', compact('kategori'));
    }

    // tambah kategori
    public function create(): View
    {
        return view('.admin/kategori.tambahKategori');
    }

    public function store(Request $request)
    {
        $kategori = new KategoriSarpras();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect('admin/kategoriSarana');
    }

    // edit
    public function edit($id)
    {
        $kategori = KategoriSarpras::find($id);
        return view('./admin/kategori.editKategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $kategori = KategoriSarpras::findOrFail($id);

        //check if image is uploaded

        //update kategori without image
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategoriSarana');
    }

    // hapus
    public function destroy(KategoriSarpras $nama_kategori)
    {
        $nama_kategori->delete();
        return redirect('/admin/kategoriSarana');
    }
}
