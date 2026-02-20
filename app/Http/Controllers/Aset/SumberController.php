<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset_sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    //
    public function index()
    {
        $sumberdana = Aset_sumber::get();

        return view('admin.Aset.sumberdana.sumberdana', compact('sumberdana'));
    }
    public function store(Request $request)
    {
        Aset_sumber::create([
            'sumberdana' => $request->sumberdana,
            'kode' => $request->kode,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil tersimpan');
    }

    public function update(Request $request, $id)
    {
        $sumberdana = Aset_sumber::findOrFail($id);

        $sumberdana->update([
            'sumberdana' => $request->sumberdana,
            'kode' => $request->kode,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sumberdana = Aset_sumber::findOrFail($id);

        $sumberdana->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
