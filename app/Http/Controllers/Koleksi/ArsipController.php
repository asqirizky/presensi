<?php

namespace App\Http\Controllers\Koleksi;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ArsipController extends Controller
{
    //
    public function index()
    {
        $arsip = Koleksi::where('kategori', 'Arsip')->latest()->get();

        return view('admin.koleksi.arsip.index', compact('arsip'));
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/koleksi/arsip', $gambar->hashName());

        Koleksi::create([
            'kategori' => 'Arsip',
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar->hashName(),
            'pembuat' => $request->pembuat,
            'lembaga' => $request->lembaga,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Arsip berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $arsip = Koleksi::findOrFail($id);

        return view('admin.koleksi.arsip.edit',compact('arsip'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {

        $arsip = Koleksi::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/koleksi/arsip', $gambar->hashName());

            Storage::delete('public/koleksi/arsip'.$arsip->gambar);

            $arsip->update([
                'kategori' => 'Arsip',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'gambar' => $gambar->hashName(),
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);

        }else{

            $arsip->update([
                'kategori' => 'Arsip',
                'judul' => $request->judul,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'pembuat' => $request->pembuat,
                'lembaga' => $request->lembaga,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect('/admin/koleksi-arsip')->with('success', 'data berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $arsip = Koleksi::findOrFail($id);

        //delete image
        Storage::delete('public/koleksi/arsip'. $arsip->gambar);

        //delete post
        $arsip->delete();

        //redirect to index
        return redirect('/admin/koleksi-arsip')->with('success', 'data berhasil dihapus!');
    }

    public function list()
    {
        $arsip = Koleksi::where('kategori', 'Arsip')->latest()->paginate(9);

        return view('koleksi.arsip', compact('arsip'));
    }

    public function detail($id)
    {
        $arsip = Koleksi::findOrFail($id);

        return view('koleksi.arsip_detail', compact('arsip'));
    }

}
