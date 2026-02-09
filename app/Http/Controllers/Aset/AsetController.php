<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset;
use App\Models\Aset\Aset_gedung;
use App\Models\Aset\Aset_kategori;
use App\Models\Aset\Aset_lokasi;
use App\Models\Aset\Aset_sumber;
use App\Models\Aset\Aset_unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AsetController extends Controller
{
    //
    public function index()
    {
        $aset = Aset::latest()->get();

        $kategori = Aset_kategori::latest()->get();
        $sumber = Aset_sumber::latest()->get();
        $lokasi = Aset_lokasi::latest()->get();


        return view('admin.Aset.aset.aset', compact(
            'aset',
            'kategori',
            'sumber',
            'lokasi'
        ));
    }

    public function tambah()
    {
        $sumber = Aset_sumber::all();
        $kategori = Aset_kategori::all();
        $lokasi = Aset_lokasi::all();

        return view('admin.Aset.aset.tambah', compact(
            'lokasi',
            'kategori',
            'sumber',
        ));
    }

    public function detail($id)
    {
        $aset = Aset::findOrFail($id);

        $kategori = Aset_kategori::all();
        $sumber = Aset_sumber::all();
        $lokasi = Aset_lokasi::all();

        return view('admin.Aset.aset.detail', compact(
            'aset',
            'kategori',
            'sumber',
            'lokasi'
        ));
    }


    public function store(Request $request)
    {
        Aset::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('aset.index')->with('success', 'Alhamdulillah, data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $aset->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);

        $aset->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');

    }

    // public function cetaklabel()
    // {
    //     $aset = Aset::latest()->get();

    //     return view('admin.Aset.aset.cetaklabel', compact('aset'));
    // }

    public function tambahantrian(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $aset->update([
            'cetaklabel' => $request->cetaklabel
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan ke antrian');
    }
    public function hapusantrian(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $aset->update([
            'cetaklabel' => "-"
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus dari antrian');
    }

    public function cetaklabel($id)
    {
        $aset = Aset::findOrFail($id);

        $kategori = Aset_kategori::all();
        $sumber = Aset_sumber::all();
        $lokasi = Aset_lokasi::all();

        return view('admin.aset.aset.pdf', compact(
            'aset',
            'kategori',
            'sumber',
            'lokasi'
        ));
    }


    public function aset_list()
    {

        // Mengambil lokasi beserta jumlah eksemplar di setiap lokasi
        $lokasi = Aset_lokasi::with(['units' => function($query) {
            $query->select('aset_id', 'lokasi_id', DB::raw('count(*) as count'))
                  ->groupBy('aset_id', 'lokasi_id');
        }])->get();

        $gedung = Aset_gedung::all();

        return view('informasi.aset', compact('lokasi', 'gedung'));

        // $lokasi = Aset_lokasi::all();

        // $aset = Aset::withCount(['units' => function ($query) use ($lokasi) {
        //     $query->where('lokasi_id', $lokasi);
        // }])->get();

        // return view('informasi.aset', compact('aset','lokasi'));
    }


}
