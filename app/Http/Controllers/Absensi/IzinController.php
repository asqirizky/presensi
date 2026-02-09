<?php

namespace App\Http\Controllers\Absensi;



use App\Models\Absensi\Izin;
use Illuminate\Http\Request;
use App\Models\Absensi\Shift;
use App\Models\Absensi\Khidmah;
use App\Http\Controllers\Controller;

class IzinController extends Controller
{
    public function index()
    {
        $izin = Izin::latest()->get();
        $khidmahs = Khidmah::get();
        $shifts = Shift::get();


        return view('admin.Absensi.Izin.izin', compact('khidmahs', 'izin', 'shifts'));
    }

    public function store(Request $request) {

        $request->validate([
            'nik' => 'required|exists:khidmahs,nik',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'shifts' => 'nullable|array', // shift boleh kosong jika izin seharian
            'keterangan' => 'required',
        ]);

        $khidmah = Khidmah::where('nik', $request->nik)->first();

        $izin = Izin::create([
            'nik' => $khidmah->nik,
            'nama_khidmah' => $khidmah->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' =>$request->keterangan,
        ]);

        if ($request->shifts) {
            $izin->shifts()->attach($request->shifts);
        }

        return back()->with('success', 'Alhamdulillah, proses izin berhasil');
    }

    public function update(Request $request, $id)
    {

        $izin = Izin::findOrFail($id);

        $izin->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->has('shifts')) {
            $izin->shifts()->sync($request->shifts);
        }

        return redirect()->back()->with('success', 'Izin berhasil diperbarui.');
    }


    public function destroy($id){

        $izin = Izin::findOrFail($id);

        $izin->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil hapus');
    }
}
