<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use App\Models\Koleksi\Koleksi_galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GaleriController extends Controller
{
    //
    public function index()
    {
        $galeri = Koleksi::where('kategori', 'Galeri')->latest()->get();

        return view('admin.koleksi.galeri.index', compact('galeri'));
    }

    public function store(Request $request)
    {

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/koleksi/galeri', $gambar->hashName());

        Koleksi::create([
            'kategori' => 'Galeri',
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar->hashName(),
            'pembuat' => $request->pembuat,
            'lembaga' => $request->lembaga,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Koleksi::findOrFail($id);

        return view('admin.koleksi.galeri.edit',compact('galeri'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {

        $galeri = Koleksi::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/koleksi/galeri', $gambar->hashName());

            Storage::delete('public/koleksi/galeri'.$galeri->gambar);

            $galeri->update([
                'kategori' => 'Galeri',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'gambar' => $gambar->hashName(),
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);

        }else{

            $galeri->update([
                'kategori' => 'Galeri',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect('/admin/koleksi-galeri')->with('success', 'data berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $galeri = Koleksi::findOrFail($id);

        //delete image
        Storage::delete('public/koleksi/galeri'. $galeri->gambar);

        //delete post
        $galeri->delete();

        //redirect to index
        return redirect('/admin/koleksi-galeri')->with('success', 'data berhasil dihapus!');
    }

    public function list()
    {
        $galeri = Koleksi::where('kategori', 'Galeri')->latest()->paginate(9);

        return view('koleksi.galeri', compact('galeri'));
    }

    public function detail($id)
    {
        $galeri = Koleksi::findOrFail($id);

        return view('koleksi.galeri_detail', compact('galeri'));
    }
}
