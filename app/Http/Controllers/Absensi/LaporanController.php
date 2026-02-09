<?php

namespace App\Http\Controllers\Absensi;

use Carbon\Carbon;
use App\Models\Absensi\Izin;
use Illuminate\Http\Request;
use App\Models\Absensi\Absen;
use App\Models\Absensi\Barokah;
use App\Models\Absensi\Khidmah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Absensi\Holiday;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class LaporanController extends Controller
{
    public function cetakPDF(Request $request)
    {
    // Ambil bulan dan tahun dari request, default ke sekarang
    $bulan = $request->input('bulan', now()->month);
    $tahun = $request->input('tahun', now()->year);

    // Mapping shift ke ID (pastikan sesuai di DB)
    $shiftIdMap = [
        'Pagi' => 1,
        'Siang' => 2,
        'Malam' => 3,
    ];

    // Ambil shift dari request (misalnya ?shift=Siang)
    $shift = $request->input('shift', 'Siang');

    $shiftMap = ['pagi' => 1, 'siang' => 2, 'malam' => 3];
    $shiftIdDipilih = $shiftMap[strtolower($shift)] ?? null;

    // Hari libur
    $listHoliday = DB::table('holidays')
        ->join('holiday_shift', 'holidays.id', '=', 'holiday_shift.holiday_id')
        ->select('holidays.tanggal_libur', 'holiday_shift.shift_id')
        ->get();

    // Format tanggal cetak dan nama bulan
    $tanggalCetak = Carbon::now()->isoFormat('dddd, D MMMM Y');
    $namaBulan = Carbon::createFromDate($tahun, $bulan, 1)->translatedFormat('F');

    // Tanggal awal dan akhir bulan
    $tanggalAwal = Carbon::createFromDate($tahun, $bulan, 1)->startOfMonth();
    $tanggalAkhir = Carbon::createFromDate($tahun, $bulan, 1)->endOfMonth();

    // List tanggal dalam bulan
    $listTanggal = collect();
    $current = $tanggalAwal->copy();
    while ($current->lte($tanggalAkhir)) {
        $listTanggal->push($current->copy());
        $current->addDay();
    }

    // Ambil data khidmah, shift, barokah
    $khidmah = Khidmah::whereIn('nik', function($query) use ($bulan, $tahun) {
        $query->select('nik')
            ->from('absens')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('nik');
    })->get();
    
    $barokah = Barokah::first();
    $semuaShift = DB::table('khidmah_shift')->get(); // semua shift

    // Filter hanya khidmah yang memiliki shift yang dipilih
    $khidmahNamaPagi = $khidmah->filter(function ($item) use ($semuaShift) {
        return $semuaShift->contains(fn($s) => $s->khidmah_id == $item->id && $s->shift_id == 1);
    })->values();

    $khidmahNamaSiang = $khidmah->filter(function ($item) use ($semuaShift) {
        return $semuaShift->contains(fn($s) => $s->khidmah_id == $item->id && $s->shift_id == 2);
    })->values();

    $khidmahNamaMalam = $khidmah->filter(function ($item) use ($semuaShift) {
        return $semuaShift->contains(fn($s) => $s->khidmah_id == $item->id && $s->shift_id == 3);
    })->values();


    // Siapkan data shift per NIK dan tanggal
    $khidmahShiftData = 'tes';
    foreach ($khidmah as $item) {
        $khidmahId = $item->id;
        $nik = $item->nik;

        foreach ($listTanggal as $tgl) {
            $hari = $tgl->translatedFormat('l'); // Contoh: "Senin"
            $tanggalStr = $tgl->toDateString();

            // Ambil semua shift_id pada hari itu
            $shifts = $semuaShift
                ->where('khidmah_id', $khidmahId)
                ->where('hari', $hari);
        }
    }

    // Ambil data absen berdasarkan shift
    $absenSiang = Absen::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
        ->where('shift', 'Siang')
        ->get()
        ->groupBy('nik');

    $absenMalam = Absen::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
        ->where('shift', 'Malam')
        ->get()
        ->groupBy('nik');

    // Ambil data izin
    $izinData = Izin::join('izin_shift', 'izin_shift.izin_id', '=', 'izins.id')
        ->where(function ($query) use ($tanggalAwal, $tanggalAkhir) {
            $query->whereBetween('tanggal_mulai', [$tanggalAwal, $tanggalAkhir])
                ->orWhereBetween('tanggal_selesai', [$tanggalAwal, $tanggalAkhir])
                ->orWhere(function ($query) use ($tanggalAwal, $tanggalAkhir) {
                    $query->where('tanggal_mulai', '<=', $tanggalAwal)
                            ->where('tanggal_selesai', '>=', $tanggalAkhir);
                });
        })
        ->get()
        ->groupBy('nik');

    $khidmahShift = DB::table('khidmah_shift')->get()
        ->groupBy(function ($item) {
            return $item->khidmah_id . '-' . $item->shift_id . '-' . $item->hari;
        });

    $selectedShifts = ['pagi', 'siang', 'malam'];

    // QR Code
    $qrBase64 = DNS2D::getBarcodePNG(route('rekap.laporan', [
        'bulan' => $bulan,
        'tahun' => $tahun,
    ]), 'QRCODE');

    // Kirim ke view
    $data = [
        'khidmahNamaPagi'   => $khidmahNamaPagi,
        'khidmahNamaSiang'  => $khidmahNamaSiang,
        'khidmahNamaMalam'  => $khidmahNamaMalam,
        'selectedShift'     => $selectedShifts,
        'listHoliday'       => $listHoliday,
        'semuaShift'        => $semuaShift,
        'shiftIdMap'        => $shiftIdMap,
        'khidmahShift'      => $khidmahShift,
        'bulan'             => $bulan,
        'tahun'             => $tahun,
        'tanggal'           => $tanggalCetak,
        'namaBulan'         => $namaBulan,
        'khidmah'           => $khidmah,
        'barokah'           => $barokah,
        'tanggalAwal'       => $tanggalAwal,
        'tanggalAkhir'      => $tanggalAkhir,
        'listTanggal'       => $listTanggal,
        'absenSiang'        => $absenSiang,
        'absenMalam'        => $absenMalam,
        'izinData'          => $izinData,
        'qrBase64'          => $qrBase64,
        'khidmahShiftData'  => $khidmahShiftData,
    ];

    // Generate PDF
    $pdf = Pdf::loadView('admin.Absensi.Rekap.laporan', $data)
        ->setPaper('a4', 'landscape');

    return $pdf->stream("rekap-absensi-{$namaBulan}-{$tahun}.pdf");

    }
}
