<?php

namespace App\Http\Controllers\Absensi;

use Illuminate\Http\Request;
use App\Models\Absensi\Barokah;
use App\Http\Controllers\Controller;

class BarokahController extends Controller
{
    public function index() {

        $barokah = Barokah::latest()->get();

        return view('admin.Absensi.Barokah.barokah', compact('barokah'));
    }

    public function store(Request $request) {

        Barokah::create([
            'barokah' => $request->barokah,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // Validasi input terlebih dahulu
        $request->validate([
            'barokah' => 'required|numeric|min:0', // pastikan hanya angka dan tidak negatif
        ]);

        // Cari data berdasarkan ID, kalau tidak ketemu akan throw 404
        $barokah = Barokah::findOrFail($id);

        // Update data
        $barokah->update([
            'barokah' => $request->barokah,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }


    public function destroy($id) {

        $barokah = Barokah::findOrFail($id);

        $barokah->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
