<?php

namespace App\Http\Controllers\Akreditasi;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi\Akreditasi_kriteria;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class KriteriaController extends Controller
{
    //
    public function index()
    {
        $kriteria = Akreditasi_kriteria::latest()->get();

        return view('admin.Akreditasi.Kriteria.index', compact('kriteria'));
    }

    public function store(Request $request)
    {
        Akreditasi_kriteria::create($request->all());

        return back()->with('success', 'Alhamdulillah, data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kriteria = Akreditasi_kriteria::findOrFail($id);

        $kriteria->update([
            'point' => $request->point,
            'komponen' => $request->komponen,
            'kategori' => $request->kategori
        ]);

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function hapus($id): RedirectResponse
    {
        //get post by ID
        $kriteria = Akreditasi_kriteria::findOrFail($id);

        //delete post
        $kriteria->delete();

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin menghapus data terpilih?";
        confirmDelete($title, $text);

        //redirect to index
        return back()->with('success', 'Alhamdulillah, data berhasil dihapus!');
    }
}
