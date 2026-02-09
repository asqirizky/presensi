<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MuseumController extends Controller
{
    //
    public function index()
    {
        $museum = Koleksi::where('kategori', 'Museum')->latest()->get();

        return view('admin.koleksi.museum.index', compact('museum'));
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/koleksi/museum', $gambar->hashName());

        Koleksi::create([
            'kategori' => 'Museum',
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar->hashName(),
            'pembuat' => $request->pembuat,
            'lembaga' => $request->lembaga,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $museum = Koleksi::findOrFail($id);

        return view('admin.koleksi.museum.edit',compact('museum'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {

        $museum = Koleksi::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/koleksi/museum', $gambar->hashName());

            Storage::delete('public/koleksi/museum'.$museum->gambar);

            $museum->update([
                'kategori' => 'Museum',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'gambar' => $gambar->hashName(),
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);

        }else{

            $museum->update([
                'kategori' => 'Museum',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect('/admin/koleksi-museum')->with('success', 'data berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $museum = Koleksi::findOrFail($id);

        //delete image
        Storage::delete('public/koleksi/museum'. $museum->gambar);

        //delete post
        $museum->delete();

        //redirect to index
        return redirect('/admin/koleksi-museum')->with('success', 'data berhasil dihapus!');
    }

    public function list()
    {
        $museum = Koleksi::where('kategori', 'Museum')->latest()->paginate(9);

        return view('koleksi.museum', compact('museum'));
    }

    public function detail($id)
    {
        $museum = Koleksi::findOrFail($id);

        return view('koleksi.museum_detail', compact('museum'));
    }
}
