<?php

use Termwind\Components\Raw;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BuletinController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Aset\AsetController;
use App\Http\Controllers\Aset\UnitController;
use App\Http\Middleware\PermissionMiddleware;
use App\Http\Controllers\Aset\GedungController;
use App\Http\Controllers\Aset\LokasiController;
use App\Http\Controllers\Aset\SumberController;
use App\Http\Controllers\Absensi\IzinController;
use App\Http\Controllers\Absensi\AbsenController;
use App\Http\Controllers\Absensi\RekapController;
use App\Http\Controllers\Absensi\ShiftController;
use App\Http\Controllers\Aset\KategoriController;
use App\Http\Controllers\Koleksi\ArsipController;
use App\Http\Controllers\Layanan\KartuController;
use App\Http\Controllers\Koleksi\GaleriController;
use App\Http\Controllers\Koleksi\MuseumController;
use App\Http\Controllers\Absensi\BarokahController;
use App\Http\Controllers\Absensi\HolidayController;
use App\Http\Controllers\Absensi\KhidmahController;
use App\Http\Controllers\Absensi\LaporanController;
use App\Http\Controllers\Kehadiran\LiburController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\Kehadiran\JadwalController;
use App\Http\Controllers\Aset\PemeliharaanController;
use App\Http\Controllers\Kehadiran\JabatanController;
use App\Http\Controllers\Kehadiran\PegawaiController;
use App\Http\Controllers\Kehadiran\RekapanController;
use App\Http\Controllers\Universitas\DosenController;
use App\Http\Controllers\Universitas\ProdiController;
use App\Http\Controllers\Administrasi\SuratController;
use App\Http\Controllers\Akreditasi\KriteriaController;
use App\Http\Controllers\Kehadiran\KehadiranController;
use App\Http\Controllers\Kehadiran\TunjanganController;
use App\Http\Controllers\Layanan\CekplagiasiController;
use App\Http\Controllers\Akreditasi\InstrumenController;
use App\Http\Controllers\Layanan\Kasir\ProdukController;
use App\Http\Controllers\Absensi\LokasiAbsensiController;
use App\Http\Controllers\Kehadiran\IzinPegawaiController;
use App\Http\Controllers\Universitas\MahasiswaController;
use App\Http\Controllers\Layanan\BebasTanggunganController;
use App\Http\Controllers\Layanan\Kasir\TransaksiController;
use App\Http\Controllers\Kehadiran\BarokahPustakawanController;
use App\Http\Controllers\Kehadiran\LaporanController as KehadiranLaporanController;
use App\Http\Controllers\Kehadiran\KehadiranLaporanController as KehadiranKehadiranLaporanController;

// Halaman utama bisa diakses oleh semua orang tanpa middleware
// Route::get('/', [WelcomeController::class, 'berita']);

// Area Admin

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Middleware hanya untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('home-user');
});

// Absensi-khidmah
Route::middleware(['auth', PermissionMiddleware::class . ':absen khidmah-lihat'])->group(function () {
    Route::resource('/admin/absensi-khidmah', KhidmahController::class);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen khidmah-tambah'])->group(function () {
    Route::get('/admin/absensi-khidmah_tambah', [KhidmahController::class, 'tambah']);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen khidmah-hapus'])->group(function () {
    Route::get('/admin/absensi-khidmah({id})/hapus', [KhidmahController::class, 'destroy']);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen khidmah-detail'])->group(function () {
    Route::get('admin/absensi-detail_khidmah({id})', [KhidmahController::class, 'detail']);
    Route::post('admin/absensi-khidmah/kelolah-shift/{id}', [KhidmahController::class, 'kelolah_shift']);
});


// Absensi-lokasi
Route::middleware(['auth', PermissionMiddleware::class . ':absen lokasi-lihat'])->group(function () {
    Route::resource('/admin/absensi-lokasi', LokasiAbsensiController::class);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen lokasi-hapus'])->group(function () {
    Route::get('/admin/absensi-lokasi({id})/hapus', [LokasiAbsensiController::class, 'hapus']);
});

// Absensi-holiday
Route::middleware(['auth', PermissionMiddleware::class . ':absen libur-lihat'])->group(function () {
    Route::resource('/admin/absensi-holiday', HolidayController::class);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen libur-hapus'])->group(function () {
    Route::get('/admin/absensi-holiday({id})/hapus', [HolidayController::class, 'destroy']);
});


// Absensi-rekap
Route::middleware(['auth', PermissionMiddleware::class . ':absen rekap-lihat'])->group(function () {
    Route::get('/admin/absensi-rekap', [RekapController::class, 'rekapHarian'])->name('rekap.harian');
    Route::get('/admin/rekap-mingguan', [RekapController::class, 'rekapMingguan'])->name('rekap.mingguan');
    Route::get('/admin/rekap-bulanan', [RekapController::class, 'rekapBulanan'])->name('rekap.bulanan');
    Route::get('/admin/rekap-laporan', [LaporanController::class, 'cetakPDF'])->name('rekap.laporan');
});

// Absensi-izin
Route::middleware(['auth', PermissionMiddleware::class . ':absen izin-lihat'])->group(function () {
    Route::resource('/admin/absensi-izin', IzinController::class);
});
Route::middleware(['auth', PermissionMiddleware::class . ':absen izin-hapus'])->group(function () {
    Route::get('/admin/absensi-izin({id})/hapus', [IzinController::class, 'destroy']);
});
// Route::get('/admin/absensi-detail_izin({id})', [IzinController::class, 'detail']);



// Absensi-shift
Route::middleware(['auth', PermissionMiddleware::class . ':absen shift-lihat'])->group(function () {
    Route::resource('/admin/absensi-shift', ShiftController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':absen shift-hapus'])->group(function () {
    Route::get('/admin/absensi-shift({id})/hapus', [ShiftController::class, 'destroy']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':absen barokah-lihat'])->group(function () {
    Route::resource('/admin/absensi-barokah', BarokahController::class);
});

// Absensi-proses
Route::resource('/admin/absensi-absen', AbsenController::class);




// Kehadiran
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran pegawai-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-pegawai', PegawaiController::class);
    Route::get('/admin/kehadiran-detail', [PegawaiController::class, 'detail'])->name('kehadiran.pegawai-detail');
    Route::get('/get-kabupaten/{id}', [PegawaiController::class, 'getKabupaten']);
    Route::get('/get-kecamatan/{id}', [PegawaiController::class, 'getKecamatan']);
    Route::get('/get-desa/{id}', [PegawaiController::class, 'getDesa']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran pegawai-detail'])->group(function () {
    Route::get('admin/kehadiran-detail_pegawai={id}', [PegawaiController::class, 'detail'])->name('pegawai.detail');
    Route::post('/admin/kehadiran-pegawai/kelolah_jadwal/{id}', [PegawaiController::class, 'kelolah_pegawai'])->name('pegawai.kelolah_jadwal');
    Route::post('/admin/pegawai/{id}/berkas', [PegawaiController::class, 'upBerkas'])->name('pegawai.upBerkas');
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran pegawai-tambah'])->group(function () {
    Route::get('/admin/kehadiran-tambah', [PegawaiController::class, 'tambah'])->name('kehadiran.tambah-pegawai');
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran pegawai-hapus'])->group(function () {
    Route::get('/admin/kehadiran-pegawai/{id}/hapus', [PegawaiController::class, 'destroy'])->name('kehadiran-pegawai.hapus');
});

// Kehadiran jadwal
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran jadwal-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-jadwal', JadwalController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran jadwal-hapus'])->group(function () {
    Route::get('/admin/kehadiran-jadwal/{id}/hapus', [JadwalController::class, 'destroy'])->name('kehadiran-jadwal.hapus');
});

// libur
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran libur-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-libur', LiburController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran libur-hapus'])->group(function () {
    Route::get('/admin/kehadiran-libur/{id}/hapus', [LiburController::class, 'destroy'])->name('kehadiran-libur.hapus');
});

// Kehadiran Izin Pegawai
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran izin-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-izin', IzinPegawaiController::class);
    Route::get('/admin/kehadiran-izinBulan', [IzinPegawaiController::class, 'izinBulan']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran izin-hapus'])->group(function () {
    Route::get('/admin/kehadiran-izin/{id}/hapus', [IzinPegawaiController::class, 'destroy'])->name('kehadiran-izin.hapus');
});

// Kehadiran jabatan
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran jabatan-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-jabatan', JabatanController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran jabatan-hapus'])->group(function () {
    Route::get('/admin/kehadiran-jabatan/{id}/hapus', [JabatanController::class, 'destroy'])->name('kehadiran-jabatan.hapus');
});

// Kehadiran barokah
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran tunjangan-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-tunjangan', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-jabatan', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-pengabdian', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-tunkel', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-kehormatan', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-anak', TunjanganController::class);
    Route::resource('/admin/kehadiran-tunjangan-rankDosen', TunjanganController::class);

});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran tunjangan-hapus'])->group(function () {
    Route::get('/admin/kehadiran-tunjangan/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan.hapus');
    Route::get('/admin/kehadiran-tunjangan-jabatan/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan-jabatan.hapus');
    Route::get('/admin/kehadiran-tunjangan-pengabdian/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan-pengabdian.hapus');
    Route::get('/admin/kehadiran-tunjangan-tunkel/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan-tunkel.hapus');
    Route::get('/admin/kehadiran-tunjangan-kehormatan/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan-kehormatan.hapus');
    Route::get('/admin/kehadiran-tunjangan-anak/{id}/hapus', [TunjanganController::class, 'destroy'])->name('kehadiran-tunjangan-anak.hapus');
});

// Kehadiran proses
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran hadir-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-hadir', KehadiranController::class);
});

// Absen biasa
Route::get('/admin/kehadiran-absen', [KehadiranController::class, 'absen'])->name('kehadiran-absen.index');
Route::post('/admin/kehadiran-absen/store', [KehadiranController::class, 'store'])->name('admin.kehadiran-absen.store');

// Rekapan kehadiran umana'
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran rekapan-lihat'])->group(function () {
    Route::get('/admin/kehadiran-rekapan', [RekapanController::class, 'index'])->name('kehadiran-rekap.index');
    Route::get('/admin/kehadiran-mingguan', [RekapanController::class, 'mingguan']);
    Route::get('/admin/kehadiran-bulanan', [RekapanController::class, 'bulanan']);
    Route::get('/admin/kehadiran-edit', [RekapanController::class, 'edit']);
    Route::post('/admin/kehadiran-edit/store', [RekapanController::class, 'store'])->name('admin.kehadiran-edit.store');
    Route::get('/admin/kehadiran-editPegawai/{id}/hapus', [RekapanController::class, 'destroy'])->name('kehadiran-edit.hapus');
});

// Generate barokah umana
Route::resource('/admin/kehadiran-barokah_pustakawan', BarokahPustakawanController::class);
Route::get('/admin/kehadiran-generate', [BarokahPustakawanController::class, 'generate']);
// Laporan Presensi Umana'
Route::get('/admin/laporan-cetak/{bulan}/{tahun}', [KehadiranKehadiranLaporanController::class, 'laporanPDF'])->name('laporan.cetak');

// route proxy
Route::get('/api/provinces', function () {
    return Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
});

Route::get('/api/regencies/{id}', function ($id) {
    return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$id}.json");
});

Route::get('/api/districts/{id}', function ($id) {
    return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$id}.json");
});

Route::get('/api/villages/{id}', function ($id) {
    return Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$id}.json");
});

