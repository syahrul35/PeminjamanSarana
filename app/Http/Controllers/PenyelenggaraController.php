<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\View\View;

class PenyelenggaraController extends Controller
{
    /// tampilkan data
    public function index()
    {
        $user = user::where('type', '0')->paginate(5);
        return view('./admin/penyelenggara/kelolaPenyelenggara', compact('user'));
    }

    // tambah kategori
    public function create(): View
    {
        return view('.admin/penyelenggara.tambahPenyelenggara');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('admin/penyelenggara');
    }

    // edit
    public function edit($id)
    {
        $user = User::find($id);
        return view('./admin/penyelenggara.editPenyelenggara', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //get post by ID
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('kelolaPenyelenggara');
    }

    // hapus
    public function destroy(User $name)
    {
        $name->delete();
        return redirect('./admin/penyelenggara');
    }
}
