<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset_pemeliharaan;
use App\Models\Aset\Aset_unit;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
{
    //
    public function index($id)
    {
        $unit = Aset_unit::findOrFail($id);

        return view('admin.Aset.pemeliharaan.index', compact('unit'));
    }

    public function store(Request $request)
    {
        Aset_pemeliharaan::create([
            'unit_id' => $request->unit_id,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'petugas' => $request->petugas,
            'biaya' => $request->biaya
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil tersimpan');
    }
    public function update(Request $request, $id)
    {
        $pemeliharaan = Aset_pemeliharaan::findOrFail($id);

        $pemeliharaan->update([
            'unit_id' => $request->unit_id,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'petugas' => $request->petugas,
            'biaya' => $request->biaya
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $pemeliharaan = Aset_pemeliharaan::findOrFail($id);

        $pemeliharaan->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }

    public function rekap()
    {
        $pemeliharaan = Aset_pemeliharaan::latest()->get();

        return view('admin.Aset.pemeliharaan.rekap', compact('pemeliharaan'));
    }
}
