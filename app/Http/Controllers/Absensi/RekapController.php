<?php

namespace App\Http\Controllers\Absensi;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonPeriod;
use App\Models\Absensi\Izin;
use Illuminate\Http\Request;
use App\Models\Absensi\Absen;
use App\Models\Absensi\Shift;
use App\Models\Absensi\Holiday;
use App\Models\Absensi\Khidmah;
use App\Http\Controllers\Controller;


class RekapController extends Controller
{
    public function rekapHarian(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();
        $tanggal_awal = $request->input('tanggal_awal') ?? now()->startOfWeek()->toDateString();
        $tanggal_akhir = $request->input('tanggal_akhir') ?? now()->endOfWeek()->toDateString();

         // Total yang hadir
        $jumlahHadir = Absen::whereDate('tanggal', $tanggal)->count();

        // Total seluruh anggota aktif (misal dari tabel khidmah)
        $totalAnggota = Khidmah::count();

        // Total yang izin hari ini
        $jumlahIzin = Izin::whereDate('tanggal_mulai', '<=', $tanggal)
                            ->whereDate('tanggal_selesai', '>=', $tanggal)
                            ->count();

        // Hitung persentase
        $persentase = $totalAnggota > 0 ? round(($jumlahHadir / $totalAnggota) * 100, 2) : 0;
        $jumlahTanpaKeterangan = $totalAnggota - $jumlahHadir;
        $persentaseTanpaKeterangan = $totalAnggota > 0 ? round(($jumlahTanpaKeterangan / $totalAnggota) *  100, 2) : 0;
        $persentaseIzin = $totalAnggota > 0 ? round(($jumlahIzin / $totalAnggota) * 100, 2) : 0;

        // Ambil semua NIK dari khidmah
        $khidmahs = Khidmah::all()->keyBy('nik');

        // Ambil absensi dan izin
        $absen = Absen::whereDate('tanggal', $tanggal)->get();
        $izin = Izin::whereDate('tanggal_mulai', '<=', $tanggal)
                    ->whereDate('tanggal_selesai', '>=', $tanggal)
                    ->with('shifts')
                    ->get();

        // Buat index izin nik+shift
        $izinIndex = $izin->mapWithKeys(function ($item) {
            return [$item->nik . '|' . $item->shift => true];
        });

        // Format absen, hanya yang tidak izin
        $absenFormatted = $absen->filter(function ($a) use ($izinIndex) {
            return !isset($izinIndex[$a->nik . '|' . $a->shift]);
        })->map(function ($a) {
            return [
                'nik' => $a->nik,
                'nama' => $a->nama,
                'tanggal' => $a->tanggal,
                'shift' => $a->shift,
                'jam_masuk' => $a->jam_masuk,
                'keterangan' => 'Hadir',
                'catatan' => null,
            ];
        });

        // Format izin
        $izinFormatted = collect();

        foreach ($izin as $i) {

            // libur dalam table izin tidak ditampilkan
            if (strtolower(trim($i->keterangan)) === 'libur') {
                continue;
            }

            $nama = $khidmahs[$i->nik]->nama ?? '-';

            foreach ($i->shifts as $shift) {
                // Ambil hanya shift di tanggal ini
                if ($shift->pivot->tanggal === $tanggal) {
                    $izinFormatted->push([
                        'nik' => $i->nik,
                        'nama' => $nama,
                        'tanggal' => $tanggal,
                        'shift' => $shift->shift, // shift-nya 'Pagi' / 'Siang' / 'Malam'
                        'jam_masuk' => null,
                        'keterangan' => $i->keterangan ?? 'Izin',
                        'catatan' => $i->catatan ?? '-',
                    ]);
                }
            }
        }

        // keterangan libur dalam table izin tidak dihitung dalam izin
        $jumlahIzin = Izin::whereDate('tanggal_mulai', '<=', $tanggal)
            ->whereDate('tanggal_selesai', '>=', $tanggal)
            ->whereRaw('LOWER(TRIM(keterangan)) != "libur"')
            ->count();


        // Gabungkan dan urutkan per shift
        $rekap = $absenFormatted
            ->concat($izinFormatted)
            ->sortBy('shift')
            ->groupBy('shift');

        return view('admin.Absensi.Rekap.harian', compact(
            'rekap',
            'tanggal_awal',
            'tanggal_akhir',
            'jumlahHadir',
            'totalAnggota',
            'persentase',
            'jumlahTanpaKeterangan',
            'persentaseTanpaKeterangan',
            'totalAnggota',
            'tanggal',
            'jumlahIzin',
            'persentaseIzin',
            'totalAnggota'
        ));
    }

    public function rekapMingguan(Request $request)
    {
        $bulan = $request->bulan ?? now()->format('Y-m');
        $minggu_ke = $request->minggu_ke ?? 1;

        $startOfMonth = Carbon::parse($bulan)->startOfMonth();
        $endOfMonth = Carbon::parse($bulan)->endOfMonth();

        $weeks = collect();
        $current = $startOfMonth->copy();

        while ($current <= $endOfMonth) {
            $start = $current->copy();
            $end = $current->copy()->addDays(6);
            if ($end > $endOfMonth) {
                $end = $endOfMonth;
            }

            $weeks->push([
                'label' => $start->format('d M') . ' - ' . $end->format('d M'),
                'start' => $start->toDateString(),
                'end' => $end->toDateString(),
            ]);

            $current = $end->copy()->addDay();
        }

        $selectedWeek = $weeks->get($minggu_ke - 1);
        $tanggal_awal = $selectedWeek['start'] ?? null;
        $tanggal_akhir = $selectedWeek['end'] ?? null;

        $jumlahHadir = 0;
        $totalKehadiranMaks = 0;
        $persentaseHadir = 0;
        $rekap = collect();

        if ($tanggal_awal && $tanggal_akhir) {
            // Ambil data pokok
            $absen = Absen::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();
            $izinList = Izin::select('nik', 'tanggal_mulai', 'tanggal_selesai', 'keterangan')->get();
            $khidmahs = Khidmah::select('nik', 'nama')->get()->keyBy('nik');
            $holidays = Holiday::get()->keyBy('tanggal_libur');

            // Total anggota dan hari
            $totalAnggota = $khidmahs->count();
            $jumlahHari = Carbon::parse($tanggal_awal)->diffInDays(Carbon::parse($tanggal_akhir)) + 1;
            $totalKehadiranMaks = $totalAnggota * $jumlahHari;
            $jumlahHadir = $absen->count();
            $persentaseHadir = $totalKehadiranMaks > 0 ? round(($jumlahHadir / $totalKehadiranMaks) * 100, 2) : 0;

            // Gabung data hadir
            $combined = collect();
            foreach ($khidmahs as $nik => $khidmah) {
                $absenUser = $absen->where('nik', $nik);
                foreach ($absenUser as $a) {
                    $combined->push([
                        'nik' => $nik,
                        'tanggal' => $a->tanggal,
                        'shift' => $a->shift,
                        'keterangan' => 'Hadir',
                    ]);
                }
            }

            $allShifts = $combined->pluck('shift')->unique();

            // Bangun struktur rekap
            foreach ($allShifts as $shift) {
                $rekap[$shift] = collect();
                foreach ($khidmahs as $nik => $k) {
                    $userAbsen = $combined->where('shift', $shift)->where('nik', $nik)->values();
                    $rekap[$shift][$nik] = $userAbsen;
                }
            }

            // Total tanpa keterangan
            $jumlahTanpaKeterangan = $absen->whereNull('keterangan')->count();

            // Total Izin
            $jumlahIzin = $izinList->whereBetween('tanggal_mulai', [$tanggal_awal, $tanggal_akhir])
                                    ->WhereBetween('tanggal_selesai', [$tanggal_awal, $tanggal_akhir])
                                    ->count();

            // Persentase Tanpa Keterangan
            $persentaseTanpaKeterangan = ($totalKehadiranMaks > 0)
                ? round(($jumlahTanpaKeterangan / $totalKehadiranMaks) * 100, 2) : 0;

            $persentaseIzin = ($totalKehadiranMaks > 0)
                ? round(($jumlahIzin / $totalKehadiranMaks) * 100, 2) : 0;
        }

        return view('admin.Absensi.Rekap.mingguan', compact(
            'rekap',
            'tanggal_awal',
            'tanggal_akhir',
            'bulan',
            'weeks',
            'minggu_ke',
            'izinList',
            'khidmahs',
            'holidays',
            'jumlahHadir',
            'totalKehadiranMaks',
            'persentaseHadir',
            'jumlahHari',
            'totalAnggota',
            'jumlahTanpaKeterangan',
            'persentaseTanpaKeterangan',
            'jumlahIzin',
            'persentaseIzin'
        ));
    }



    public function rekapBulanan(Request $request)
    {

        // Ambil bulan default bulan ini
        $bulan = $request->bulan ?? now()->format('Y-m');
        $startOfMonth = Carbon::parse($bulan)->startOfMonth();
        $endOfMonth = Carbon::parse($bulan)->endOfMonth();

        // Jumlah Anggota yang aktif
        $totalAnggota = Khidmah::count();
        $jumlahHari = $startOfMonth->diffInDays($endOfMonth) + 1;
        $jumlahHadir = Absen::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->count();
        $totalKehadiranMaks = $totalAnggota * $jumlahHari;

        // Hitung jumlah Izin
        $jumlahIzin = Izin::where(function ($q) use ($startOfMonth, $endOfMonth) {
            $q->whereBetween('tanggal_mulai', [$startOfMonth, $endOfMonth])
              ->orWhereBetween('tanggal_selesai', [$startOfMonth, $endOfMonth]);
        })->count();

        // Hitung Tanpa Keterangan
        $jumlahTanpaKeterangan = $totalKehadiranMaks - ($jumlahHadir + $jumlahIzin);

        // Persentase Kehadiran
        $persentaseHadir = ($totalKehadiranMaks > 0)
            ? round(($jumlahHadir / $totalKehadiranMaks) * 100, 2) : 0;

        // Persentase Tanpa Keterangan
        $persentaseTanpaKeterangan = $totalKehadiranMaks > 0
            ? round(($jumlahTanpaKeterangan / $totalKehadiranMaks) * 100, 2) : 0;

        // Persentase Izin
        $persentaseIzin = ($totalKehadiranMaks > 0)
            ? round(($jumlahIzin / $totalKehadiranMaks) * 100) : 0;


        $bulan = $request->bulan ?? now()->format('Y-m');

        $startOfMonth = Carbon::parse($bulan)->startOfMonth();
        $endOfMonth = Carbon::parse($bulan)->endOfMonth();

        // Ambil semua absensi dalam ..... tersebut
        $absensi = Absen::select('nik', 'nama', 'shift', 'keterangan', 'tanggal')
            ->whereBetween('tanggal', [$startOfMonth->toDateString(), $endOfMonth->toDateString()])
            ->get();

        // Gunakan total 30 hari per bulan (bukan weekday saja)
        $totalHari = 30;

        // Kelompokkan per shift, lalu per NIK
        $rekap = $absensi->groupBy('shift')->map(function ($absensiPerShift) use ($totalHari) {
            return $absensiPerShift->groupBy('nik')->map(function ($absensiPerOrang) use ($totalHari) {
                $nama = $absensiPerOrang->first()->nama;
                $jumlahHadir = $absensiPerOrang->where('keterangan', 'Hadir')->count();
                $persentase = $totalHari > 0 ? round(($jumlahHadir / $totalHari) * 100, 2) : 0;

                return [
                    'nama' => $nama,
                    'jumlah_hadir' => $jumlahHadir,
                    'persentase' => $persentase,
                ];
            });
        });

        return view('admin.Absensi.Rekap.bulanan', compact(
            'rekap',
            'bulan',
            'totalHari',
            'startOfMonth',
            'endOfMonth',
            'jumlahHadir',
            'persentaseHadir',
            'totalKehadiranMaks',
            'jumlahHari',
            'totalAnggota',
            'jumlahTanpaKeterangan',
            'persentaseTanpaKeterangan',
            'jumlahIzin',
            'persentaseIzin',
        ));
    }

    public function index(Request $request) {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();
        $tanggal_awal = $request->input('tanggal_awal') ?? now()->startOfWeek()->toDateString();
        $tanggal_akhir = $request->input('tanggal_akhir') ?? now()->endOfWeek()->toDateString();

        $shifts = Shift::all();

         // Total yang hadir
        $jumlahHadir = Absen::whereDate('tanggal', $tanggal)->count();

        // Total seluruh anggota aktif (misal dari tabel khidmah)
        $totalAnggota = Khidmah::count();

        // Total yang izin hari ini
        $jumlahIzin = Izin::whereDate('tanggal_mulai', '<=', $tanggal)
                            ->whereDate('tanggal_selesai', '>=', $tanggal)
                            ->count();

        // Hitung persentase
        $persentase = $totalAnggota > 0 ? round(($jumlahHadir / $totalAnggota) * 100, 2) : 0;
        $jumlahTanpaKeterangan = $totalAnggota - $jumlahHadir;
        $persentaseTanpaKeterangan = $totalAnggota > 0 ? round(($jumlahTanpaKeterangan / $totalAnggota) *  100, 2) : 0;
        $persentaseIzin = $totalAnggota > 0 ? round(($jumlahIzin / $totalAnggota) * 100, 2) : 0;

        // Ambil semua NIK dari khidmah
        $khidmahs = Khidmah::all()->keyBy('nik');

        // Ambil absensi dan izin
        $absen = Absen::whereDate('tanggal', $tanggal)->get();
        $izin = Izin::whereDate('tanggal_mulai', $tanggal)->get();

        // Buat index izin nik+shift
        $izinIndex = $izin->mapWithKeys(function ($item) {
            return [$item->nik . '|' . $item->shift => true];
        });

        // Format absen, hanya yang tidak izin
        $absenFormatted = $absen->filter(function ($a) use ($izinIndex) {
            return !isset($izinIndex[$a->nik . '|' . $a->shift]);
        })->map(function ($a) {
            return [
                'id' => $a->id,
                'nik' => $a->nik,
                'nama' => $a->nama,
                'tanggal' => $a->tanggal,
                'shift' => $a->shift,
                'jam_masuk' => $a->jam_masuk,
                'keterangan' => 'Hadir',
                'catatan' => null,
            ];
        });

        // Format izin
        $izinFormatted = $izin->map(function ($i) use ($khidmahs, $tanggal) {
            return [
                'nik' => $i->nik,
                'nama' => $khidmahs[$i->nik]->nama ?? '-',
                'tanggal' => $tanggal, // Pakai tanggal rekap
                'shift' => $i->shift,
                'jam_masuk' => null,
                'keterangan' => $i->keterangan ?? 'Izin',
                'catatan' => $i->catatan ?? '-',
            ];
        });

        // Gabungkan dan urutkan per shift
        $rekap = $absenFormatted
            ->concat($izinFormatted)
            ->sortBy('shift')
            ->groupBy('shift');

        return view('admin.Absensi.Rekap.editAbsen', compact(
            'shifts',
            'khidmahs',
            'rekap',
            'tanggal_awal',
            'tanggal_akhir',
            'jumlahHadir',
            'totalAnggota',
            'persentase',
            'jumlahTanpaKeterangan',
            'persentaseTanpaKeterangan',
            'totalAnggota',
            'tanggal',
            'jumlahIzin',
            'persentaseIzin',
            'totalAnggota'
        ));
    }

    public function store(Request $request) {

        $request->validate([
            'nik' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'shift' => 'required|string|max:20',
        ]);

        $khidmah = Khidmah::where('nik', $request->nik)->first();

        if (!$khidmah) {
            return back()->with('error', 'Astagfirullah, data tidak ditemukan');
        }

        Absen::create([
            'nik' => $request->nik,
            'nama' => $khidmah->nama,
            'tanggal' => $request->tanggal,
            'shift' => $request->shift,
            'jam_masuk' => now()->format('H:i:s'),
            'keterangan' => 'Hadir',
        ]);

        return back()->with('success', 'Alhamdulillah, absen berhasil di tambahkan');
    }

    public function update(Request $request, $id) {

        $request->validate([
            'nik' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'shift' => 'required|string|max:20',
            'keterangan' => 'required|string|max:50',
        ]);

        $absen = Absen::findOrFail($id);

        // Cek apakah nik ada di tabel khidmah
        $khidmah = Khidmah::where('nik', $request->nik)->first();
        if (!$khidmah) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        if (!$absen) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        $absen->update([
            'nik' => $request->nik,
            'nama' => $khidmah->nama,
            'tanggal' => $request->tanggal,
            'shift' => $request->shift,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nik, $tanggal, $shift) {
        $absen = Absen::where('nik', $nik)
                    ->where('tanggal', $tanggal)
                    ->where('shift', $shift)
                    ->first();

        if (!$absen) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        $absen->delete();

        return back()->with('success', 'Absen berhasil dihapus');
    }

}
