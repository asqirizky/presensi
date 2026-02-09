<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kehadiran\Libur;
use App\Models\Kehadiran\Jadwal;
use App\Models\Kehadiran\Pegawai;
use App\Http\Controllers\Controller;

class LiburController extends Controller
{

    public function index(Request$request) {

        $bulanInput = $request->bulan ?? now()->format('Y-m');

        $bulanAngka = Carbon::parse($bulanInput)->month;
        $tahunAngka = Carbon::parse($bulanInput)->year;

        $bulan = Carbon::parse($bulanInput)->isoFormat('MMMM YYYY'); // ← Desember 2025

        $query = Libur::orderBy('tanggal', 'asc')
            ->whereMonth('tanggal', $bulanAngka)
            ->whereYear('tanggal', $tahunAngka);

        $jadwals = Jadwal::get();
        $ruang = Pegawai::where('ruang')->get();

        $libur = $query->get();

        return view('admin.Kehadiran.libur.libur', compact(
            'jadwals',
            'libur',
            'ruang',
            'bulan',
            'bulanInput'
        ));
    }

    public function store(Request $request)
    {

        $libur = Libur::create([
            'tanggal' => $request->tanggal,
            'ruang' => $request->ruang,
            'acara' => $request->acara,
        ]);

        $libur->jadwals()->attach($request->jadwals);

        return back()->with('success', 'data berhasil ditambahkan');
    }

    public function update(Request $request, $id) {

        $libur = Libur::findOrFail($id);

        $libur->update([
            'tanggal' => $request->tanggal,
            'ruang' => $request->ruang,
            'acara' => $request->acara,
        ]);

        $libur->jadwals()->sync($request->jadwals);

        return back()->with('success', 'Data berhasil di perbarui');
    }

    public function destroy ($id)
    {
        $libur = Libur::findOrFail($id);

        $libur->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
