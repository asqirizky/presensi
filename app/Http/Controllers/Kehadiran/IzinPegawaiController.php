<?php

namespace App\Http\Controllers\Kehadiran;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kehadiran\Jadwal;
use App\Models\Kehadiran\Pegawai;
use App\Http\Controllers\Controller;
use App\Models\Absensi\Izin;
use App\Models\Kehadiran\IzinPegawai;
use App\Models\Kehadiran\PegawaiJadwal;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class IzinPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->filled('tanggal') ? $request->tanggal : Carbon::now()->format('Y-m-d');

        $izin = IzinPegawai::with('jadwals')
            ->whereDate('tgl_mulai', '<=', $tanggal)
            ->whereDate('tgl_selesai', '>=', $tanggal)
            ->orderByDesc('tgl_mulai')
            ->get();

        $izin = IzinPegawai::all();

        $pegawai = Pegawai::all();
        $jadwal = Jadwal::all();

        // Ambil shift per izin dan sertakan tanggal pivot
        $selectedJadwalIds = [];
        $selectedJadwalTanggal = [];

        foreach ($izin as $item) {
            $selectedJadwalIds[$item->id] = $item->jadwals->pluck('id')->toArray();

            // simpan tanggal per shift dari pivot
            foreach ($item->jadwals as $jad) {
                $selectedJadwalTanggal[$item->id][$jad->id] = $jad->pivot->tanggal ?? null;
            }
        }

        return view('admin.Kehadiran.izin.izin_pegawai', compact(
            'pegawai',
            'jadwal',
            'izin',
            'tanggal',
            'selectedJadwalIds',
            'selectedJadwalTanggal'
        ));
    }

    public function izinBulan(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);

        // Rentang tanggal bulan terpilih
        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth()->format('Y-m-d');
        $endDate   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('Y-m-d');

        // Ambil izin yang overlap dengan bulan tsb
        $izin = IzinPegawai::with('jadwals')
            ->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('tgl_mulai', [$startDate, $endDate])
                ->orWhereBetween('tgl_selesai', [$startDate, $endDate])
                ->orWhere(function ($q2) use ($startDate, $endDate) {
                    $q2->where('tgl_mulai', '<=', $startDate)
                        ->where('tgl_selesai', '>=', $endDate);
                });
            })
            ->orderBy('tgl_mulai')
            ->get();

        $pegawai = Pegawai::all();
        $jadwal  = Jadwal::all();

        // Ambil shift per izin dan tanggal dari pivot
        $selectedJadwalIds = [];
        $selectedJadwalTanggal = [];

        foreach ($izin as $item) {
            $selectedJadwalIds[$item->id] = $item->jadwals->pluck('id')->toArray();

            foreach ($item->jadwals as $jad) {
                $selectedJadwalTanggal[$item->id][$jad->id] = $jad->pivot->tanggal ?? null;
            }
        }

        return view('admin.Kehadiran.izin.izinBulan', compact(
            'pegawai',
            'jadwal',
            'izin',
            'bulan',
            'tahun',
            'startDate',
            'endDate',
            'selectedJadwalIds',
            'selectedJadwalTanggal'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:pegawais,nik',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'shifts' => 'required|array', // tetap pakai nama 'shifts' karena di form checkbox-nya begitu
            'keterangan' => 'required|string',
        ]);

        $pegawai = Pegawai::where('nik', $request->nik)->first();

        if (!$pegawai) {
            return back()->withErrors(['nik' => 'Data pegawai tidak ditemukan.']);
        }

        $izinPegawai = IzinPegawai::create([
            'nik' => $request->nik,
            'nama_pegawai' => $pegawai->nama_pegawai,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'keterangan' => $request->keterangan,
        ]);

        // Simpan ke pivot 'izin_pegawai_jadwal' (bukan shifts)
        foreach (Carbon::parse($request->tgl_mulai)->daysUntil($request->tgl_selesai) as $date) {
            foreach ($request->shifts as $jadwalId) {
                $izinPegawai->jadwal()->attach($jadwalId, [
                    'tanggal' => $date->toDateString()
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data izin berhasil ditambah.');
    }

    public function update(Request $request, $id)
    {
        // Validasi dulu biar aman
        $request->validate([
            'tgl_mulai'   => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',
            'keterangan'  => 'nullable|string',
            'shifts'      => 'nullable|array',
        ]);

        $izin = IzinPegawai::with('jadwals')->findOrFail($id);

        // Update data izin
        $izin->update([
            'tgl_mulai'   => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'keterangan'  => $request->keterangan,
        ]);

        // Hapus relasi jadwal lama
        $izin->jadwals()->detach();

        // Kalau ada shift yang dipilih
        if (!empty($request->shifts)) {
            $tanggalMulai   = \Carbon\Carbon::parse($request->tgl_mulai);
            $tanggalSelesai = \Carbon\Carbon::parse($request->tgl_selesai);

            // Loop semua tanggal dan shift
            for ($date = $tanggalMulai->copy(); $date->lte($tanggalSelesai); $date->addDay()) {
                foreach ($request->shifts as $jadwalId) {
                    $izin->jadwals()->attach($jadwalId, [
                        'tanggal' => $date->format('Y-m-d'),
                    ]);
                }
            }
        }

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id) {

        $izin = IzinPegawai::findOrFail($id);

        $izin->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
