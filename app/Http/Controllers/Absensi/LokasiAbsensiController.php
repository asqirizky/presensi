<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Absensi\Lokasi;
use Illuminate\Http\Request;

class LokasiAbsensiController extends Controller
{
    //
    public function index(){

        $lokasi = Lokasi::latest()->get();

        return view('admin.Absensi.Lokasi.lokasi', compact('lokasi'));
    }

    public function store(Request $request){

        // Membuat nomor induk unik
        $lastUser = Lokasi::latest()->first();
        $lastId = $lastUser ? $lastUser->id : 0; // Ambil ID terakhir
        $kode_lokasi = 'LIB_' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT); // Format NI-000001, NI-000002, dst.

        Lokasi::create([
            'lokasi' => $request->lokasi,
            'kode_lokasi' => $kode_lokasi,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan.');
    }

    public function update(Request $request, $id){

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->update([
            'lokasi' => $request->lokasi,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function hapus($id){

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->delete();

        return back()->with('success','Alhamdulillah, data berhasil dihapus');
    }
}
