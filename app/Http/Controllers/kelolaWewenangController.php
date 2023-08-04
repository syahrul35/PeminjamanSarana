<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wewenang;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class kelolaWewenangController extends Controller
{
    /// tampilkan data
    public function index()
    {
        //get kategori
        $wewenang = Wewenang::all();

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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->type = 2;
        $user->save();

        if($user->type = 3)
        {
            $wewenang = new Wewenang();
            $wewenang->id_user = $user->id;
            $wewenang->jabatan_wewenang = '-';
            $wewenang->telp_wewenang = '-';
            $wewenang->save();
        }
        return redirect('admin/wewenang');
    }

    // edit
    public function edit($id)
    {
        $wewenang = Wewenang::find($id);
        
        
        $nama = DB::table('wewenangs')
                        ->join('users', 'users.id', '=', 'wewenangs.id_user')
                        ->where('users.type', 2)
                        ->select('users.*', 'wewenangs.*')
                        ->get();

        return view('./admin/wewenang.editWewenang', compact('wewenang', 'nama'));
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
