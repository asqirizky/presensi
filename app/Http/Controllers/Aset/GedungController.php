<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset_gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    //
    public function index()
    {
        $gedung = Aset_gedung::get();

        return view('admin.Aset.gedung.gedung', compact('gedung'));
    }
    public function store(Request $request)
    {
        Aset_gedung::create([
            'gedung' => $request->gedung,
            'area' => $request->area,
            'luas' => $request->luas,
            'lantai' => $request->lantai
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil tersimpan');
    }
    public function update(Request $request, $id)
    {
        $gedung = Aset_gedung::findOrFail($id);

        $gedung->update([
            'gedung' => $request->gedung,
            'area' => $request->area,
            'luas' => $request->luas,
            'lantai' => $request->lantai
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $gedung = Aset_gedung::findOrFail($id);

        $gedung->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
