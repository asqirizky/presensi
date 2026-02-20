<?php

namespace App\Http\Controllers\Akreditasi;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi\Akreditasi_instrumen;
use App\Models\Akreditasi\Akreditasi_kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class InstrumenController extends Controller
{
    public function index()
    {
        $instrumen = Akreditasi_instrumen::latest()->get();
        $kriteria = Akreditasi_kriteria::latest()->get();

        return view('admin.Akreditasi.Instrumen.index', compact('instrumen', 'kriteria'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('dokumen')) {

            $dokumen = $request->file('dokumen');
            $dokumen->storeAs('public/akreditasi', $dokumen->hashName());

            Akreditasi_instrumen::create([
                'aspek_penilaian' => $request->aspek_penilaian,
                'kriteria' => $request->kriteria,
                'item_penilaian' => $request->item_penilaian,
                'item_terpenuhi' => $request->item_terpenuhi,
                'bukti_fisik' => $request->bukti_fisik,
                'dokumen' => $dokumen->hashName()
            ]);

        }else{

            Akreditasi_instrumen::create([
                'aspek_penilaian' => $request->aspek_penilaian,
                'kriteria' => $request->kriteria,
                'item_penilaian' => $request->item_penilaian,
                'item_terpenuhi' => $request->item_terpenuhi,
                'bukti_fisik' => $request->bukti_fisik,
            ]);
        }


        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan');

    }

    public function update(Request $request, $id) : RedirectResponse
    {

        $instrumen = Akreditasi_instrumen::findOrFail($id);

        if ($request->hasFile('dokumen')) {

            $dokumen = $request->file('dokumen');
            $dokumen->storeAs('public/akreditasi', $dokumen->hashName());

            Storage::delete('public/akreditasi/'.$instrumen->dokumen);

            $instrumen->update([

                'dokumen' => $dokumen->hashName(),
                'aspek_penilaian' => $request->aspek_penilaian,
                'kriteria' => $request->kriteria,
                'item_penilaian' => $request->item_penilaian,
                'item_terpenuhi' => $request->item_terpenuhi,
                'bukti_fisik' => $request->bukti_fisik,

            ]);
        }else{
            $instrumen->update([
                'aspek_penilaian' => $request->aspek_penilaian,
                'kriteria' => $request->kriteria,
                'item_penilaian' => $request->item_penilaian,
                'item_terpenuhi' => $request->item_terpenuhi,
                'bukti_fisik' => $request->bukti_fisik,
            ]);


        }
        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui!');
    }

    public function hapus($id): RedirectResponse
    {
        //get post by ID
        $instrumen = Akreditasi_instrumen::findOrFail($id);

        //delete image
        Storage::delete('public/akreditasi/'. $instrumen->dokumen);

        //delete post
        $instrumen->delete();

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin menghapus data terpilih?";
        confirmDelete($title, $text);

        //redirect to index
        return back()->with('success', 'Alhamdulillah, data berhasil dihapus!');
    }

}
