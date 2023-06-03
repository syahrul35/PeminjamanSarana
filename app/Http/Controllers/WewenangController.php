<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wewenang;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WewenangController extends Controller
{
    /// tampilkan data
    public function index()
    {
        //get kategori
        $wewenang = Wewenang::latest()->paginate(5);

        //render view with kategori
        return view('./admin/wewenang/wewenang', compact('wewenang'));
    }

    // tambah kategori
    public function create(): View
    {
        return view('.admin/wewenang.tambahWewenang');
    }

    public function store(Request $request)
    {
        $wewenang = new Wewenang();
        $wewenang->nama_wewenang = $request->nama_wewenang;
        $wewenang->jabatan_wewenang = $request->jabatan_wewenang;
        $wewenang->telp_wewenang = $request->telp_wewenang;
        $wewenang->save();
        return redirect('admin/wewenang');
    }

    // edit
    public function edit($id)
    {
        $wewenang = Wewenang::find($id);
        return view('./admin/wewenang.editWewenang', compact('wewenang'));
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $wewenang = Wewenang::findOrFail($id);

        //check if image is uploaded

        //update wewenang without image
        $wewenang->update([
            'nama_wewenang' => $request->nama_wewenang,
            'jabatan_wewenang' => $request->jabatan_wewenang,
            'telp_wewenang' => $request->telp_wewenang,
        ]);
        return redirect()->route('wewenang');
    }

    // hapus
    public function destroy(Wewenang $nama_wewenang)
    {
        $nama_wewenang->delete();
        return redirect('/admin/wewenang');
    }
}
