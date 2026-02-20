<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset_kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $item = Aset_kategori::latest()->get();

        return view('admin.Aset.kategori.index', compact('item'));
    }

    public function store(Request $request)
    {
        Aset_kategori::create([
            'kategori' => $request->kategori,
            'kode' => $request->kode,
            'jenis' => $request->jenis,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil tersimpan');
    }
    public function update(Request $request, $id)
    {
        $kategori = Aset_kategori::findOrFail($id);

        $kategori->update([
            'kategori' => $request->kategori,
            'kode' => $request->kode,
            'jenis' => $request->jenis,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $kategori = Aset_kategori::findOrFail($id);

        $kategori->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
