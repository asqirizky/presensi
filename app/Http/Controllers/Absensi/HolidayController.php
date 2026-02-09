<?php

namespace App\Http\Controllers\Absensi;

use Illuminate\Http\Request;
use App\Models\Absensi\Shift;
use App\Models\Absensi\Holiday;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    public function index(){

        $holiday = Holiday::latest()->get();
        $shifts = Shift::get();

        return view('admin.Absensi.Holiday.holiday', compact('holiday', 'shifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_libur' => 'required|date',
            'nama_libur' => 'required|string',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'shifts' => 'required|array'
        ]);

        $holiday = Holiday::create([
            'tanggal_libur' => $request->tanggal_libur,
            'nama_libur' => $request->nama_libur,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
        ]);

        $holiday->shifts()->attach($request->shifts);

        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_libur' => 'required|date',
            'nama_libur' => 'required|string',
            'jenis' => 'required|string',
            'keterangan' => 'required|string',
            'shifts' => 'required|array',
        ]);

        $holiday = Holiday::findOrFail($id);

        $holiday->update([
            'tanggal_libur' => $request->tanggal_libur,
            'nama_libur' => $request->nama_libur,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
        ]);

        $holiday->shifts()->sync($request->shifts); // sync checkbox input

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }


    public function destroy($id){

        $holiday = Holiday::findOrFail($id);

        $holiday->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
