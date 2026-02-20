<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset_gedung;
use App\Models\Aset\Aset_lokasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    //
    public function index()
    {
        $item = Aset_lokasi::get();
        $gedung = Aset_gedung::get();

        return view('admin.Aset.ruang.ruang', compact('item', 'gedung'));
    }
    public function store(Request $request)
    {
        Aset_lokasi::create([
            'lokasi' => $request->lokasi,
            'gedung' => $request->gedung,
            'kode' => $request->kode,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil tersimpan');
    }
    public function update(Request $request, $id)
    {
        $lokasi = Aset_lokasi::findOrFail($id);

        $lokasi->update([
            'lokasi' => $request->lokasi,
            'gedung' => $request->gedung,
            'kode' => $request->kode,

        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $lokasi = Aset_lokasi::findOrFail($id);

        $lokasi->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
