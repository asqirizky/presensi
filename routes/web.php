<?php

use App\Http\Controllers\Absensi\AbsenController;
use App\Http\Controllers\Absensi\BarokahController;
use App\Http\Controllers\Absensi\HolidayController;
use App\Http\Controllers\Absensi\IzinController;
use App\Http\Controllers\Absensi\KhidmahController;
use App\Http\Controllers\Absensi\LaporanController;
use App\Http\Controllers\Absensi\LokasiAbsensiController;
use App\Http\Controllers\Absensi\RekapController;
use App\Http\Controllers\Absensi\ShiftController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kehadiran\BarokahPustakawanController;
use App\Http\Controllers\Kehadiran\IzinPegawaiController;
use App\Http\Controllers\Kehadiran\KehadiranController;
use App\Http\Controllers\Kehadiran\KehadiranLaporanController as KehadiranKehadiranLaporanController;
use App\Http\Controllers\Kehadiran\RekapanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Master\JabatanController;
use App\Http\Controllers\Master\JadwalController;
use App\Http\Controllers\Master\LiburController;
use App\Http\Controllers\Master\PendidikanPagiController;
use App\Http\Controllers\Master\PustakawanController;
use App\Http\Controllers\Master\RuangController;
use App\Http\Controllers\Payroll\PayrollController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PermissionMiddleware;
use App\Models\Master\Pustakawan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

// Middleware hanya untuk pengguna dengan izin "manage users"
Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-lihat'])->group(function () {
    Route::resource('/admin/pengguna', UserController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-ubah password'])->group(function () {
    Route::post('/admin/pengguna/ubahpassword({id})', [UserController::class, 'ubahpassword']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-hapus'])->group(function () {
    Route::get('/admin/pengguna({id})/hapus', [UserController::class, 'hapus']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':pengguna-akses pengguna'])->group(function () {
    Route::get('/admin/pengguna-akses({id})', [UserController::class, 'akses']);
    Route::post('/admin/pengguna-akses/{id}/update', [UserController::class, 'updateAkses']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':akses pengguna-lihat'])->group(function () {
    Route::resource('/admin/pengguna-akses', PermissionController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':akses pengguna-hapus'])->group(function () {
    Route::get('/admin/pengguna-akses/{id}/hapus', [PermissionController::class, 'destroy']);
});


// Absensi-rekap
Route::middleware(['auth', PermissionMiddleware::class . ':absen rekap-lihat'])->group(function () {
    Route::get('/admin/absensi-rekap', [RekapController::class, 'rekapHarian'])->name('rekap.harian');
    Route::get('/admin/rekap-mingguan', [RekapController::class, 'rekapMingguan'])->name('rekap.mingguan');
    Route::get('/admin/rekap-bulanan', [RekapController::class, 'rekapBulanan'])->name('rekap.bulanan');
    Route::get('/admin/rekap-laporan', [LaporanController::class, 'cetakPDF'])->name('rekap.laporan');
});



// Absensi-proses
Route::resource('/admin/absensi-absen', AbsenController::class);

// Kehadiran Izin Pegawai
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran izin-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-izin', IzinPegawaiController::class);
    Route::get('/admin/kehadiran-izinBulan', [IzinPegawaiController::class, 'izinBulan']);
});

Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran izin-hapus'])->group(function () {
    Route::get('/admin/kehadiran-izin/{id}/hapus', [IzinPegawaiController::class, 'destroy'])->name('kehadiran-izin.hapus');
});

// Kehadiran proses
Route::middleware(['auth', PermissionMiddleware::class . ':absen attendance-lihat'])->group(function () {
    Route::resource('/admin/absen-attendance', AttendanceController::class);
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
Route::middleware(['auth', PermissionMiddleware::class . ':kehadiran generate-lihat'])->group(function () {
    Route::resource('/admin/kehadiran-barokah_pustakawan', BarokahPustakawanController::class);
    Route::get('/admin/kehadiran-generate', [BarokahPustakawanController::class, 'generate'])->name('kehadiran-generate');
});

// Master 
// Pustakawan
Route::middleware(['auth', PermissionMiddleware::class . ':master pustakawan-lihat'])->group(function () {
    Route::resource('/admin/master-pustakawan', PustakawanController::class);
    Route::get('/admin/master-detail', [PustakawanController::class, 'detail'])->name('master-pustakawan.detail');
});

Route::middleware(['auth', PermissionMiddleware::class . ':master pustakawan-detail'])->group(function () {
    Route::get('/admin/master-detail_pustakawan={id}', [PustakawanController::class, 'detail'])->name('pustakawan-detail');
    Route::post('/admin/master-pustakawan/kelolah_jadwal/{id}', [PustakawanController::class, 'kelolah_pustakawan'])->name('pustakawan.kelolah_jadwal');
    Route::post('/admin/master/{id}/berkas', [PustakawanController::class, 'upBerkas'])->name('pustakawan.upBerkas');
});

Route::middleware(['auth', PermissionMiddleware::class . ':master pustakawan-tambah'])->group(function () {
    Route::get('/admin/master-tambah', [PustakawanController::class, 'tambah'])->name('master-tambah.pegawai');
});

Route::middleware(['auth', PermissionMiddleware::class . ':master pustakawan-hapus'])->group(function () {
    Route::get('/admin/master-pustakawan/{id}/hapus', [PustakawanController::class, 'destroy'])->name('master-pustakawan.hapus');
});

// Jadwal
Route::middleware(['auth', PermissionMiddleware::class . ':master jadwal-lihat'])->group(function () {
    Route::resource('/admin/master-jadwal', JadwalController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':master jadwal-hapus'])->group(function () {
    Route::get('/admin/master-jadwal/{id}/hapus', [JadwalController::class, 'destroy'])->name('master-jadwal.hapus');
});

// Libur
Route::middleware(['auth', PermissionMiddleware::class . ':master libur-lihat'])->group(function () {
    Route::resource('/admin/master-libur', LiburController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':master libur-hapus'])->group(function () {
    Route::get('/admin/master-libur/{id}/hapus', [LiburController::class, 'destroy'])->name('master-libur.hapus');
});

// Ruang
Route::middleware(['auth', PermissionMiddleware::class . ':master ruang-lihat'])->group(function () {
    Route::resource('/admin/master-ruang', RuangController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':master ruang-hapus'])->group(function () {
    Route::get('/admin/master-ruang/{id}/hapus', [RuangController::class, 'destroy'])->name('master-ruang.hapus');
});

// Jabatan
Route::middleware(['auth', PermissionMiddleware::class . ':master jabatan-lihat'])->group(function () {
    Route::resource('/admin/master-jabatan', JabatanController::class);
});

Route::middleware(['auth', PermissionMiddleware::class . ':master jabatan-hapus'])->group(function () {
    Route::get('/admin/master-jabatan/{id}/hapus', [JabatanController::class, 'destroy'])->name('master-jabatan.hapus');
});

// Pendidikan Pagi
Route::middleware(['auth', PermissionMiddleware::class . ':master pendpagi-lihat'])->group(function () {
    Route::resource('/admin/master-pendpagi', PendidikanPagiController::class);
});

// Payroll
Route::middleware(['auth', PermissionMiddleware::class . ':payroll tunjangan-lihat'])->group(function () {
    // Create and Update
    Route::resource('/admin/payroll-kehadiran', PayrollController::class);
    Route::resource('/admin/payroll-jabatan', PayrollController::class);
    Route::resource('/admin/payroll-pengabdian', PayrollController::class);
    Route::resource('/admin/payroll-tunkel', PayrollController::class);
    Route::resource('/admin/payroll-kehormatan', PayrollController::class);
    Route::resource('/admin/payroll-anak', PayrollController::class);
    Route::resource('/admin/payroll-rankDosen', PayrollController::class);
    
    // Delete
    Route::get('/admin/payroll-kehadiran/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-kehadiran.hapus');
    Route::get('/admin/payroll-jabatan/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-jabatan.hapus');
    Route::get('/admin/payroll-pengabdian/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-pengabdian.hapus');
    Route::get('/admin/payroll-tunkel/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-tunkel.hapus');
    Route::get('/admin/payroll-kehormatan/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-kehormatan.hapus');
    Route::get('/admin/payroll-anak/{id}/hapus', [PayrollController::class, 'destroy'])->name('payroll-anak.hapus');
    Route::get('/admin/payroll-rankDosen/{id}/hapus', [PayrollController::class, 'destroy'])->name('payrol-rankDosen.hapus');
});



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

