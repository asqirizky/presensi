<?php

namespace App\Http\Controllers\Absensi;

use Illuminate\Http\Request;
use App\Models\Absensi\Shift;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    public function index(){

        $shift = Shift::latest()->get();

        return view('admin.Absensi.Shift.shift', compact('shift'));
    }

    public function store(Request $request){

        Shift::create([
            'shift' => $request->shift,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return back()->with('success', 'Alhamdulillah data berhasil ditambahkan');
    }

    public function update(Request $request, $id){

        $shift = Shift::findOrFail($id);

        $shift->update([
            'shift' => $request->shift,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return back()->with('success', 'Alhamdullah data berhasil diperbarui');
    }

    public function destroy($id) {
        $shift = Shift::findOrFail($id);

        $shift->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
