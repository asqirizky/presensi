<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        $user = User::latest()->get();

        return view('admin.kegiatan.index', compact('kegiatan', 'user'));
    }

    public function store(Request $request)
    {
        Kegiatan::create([
            'kegiatan' => $request->kegiatan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'pj' => $request->pj,
            'slug' => Carbon::parse($request->tanggal)->isoFormat('MMMM-Y'),
            'ket' => 'Belum',
        ]);

        return redirect('/admin/kegiatan')->with('success', 'Alhamdulillah, kegiatan berhasil tersimpan');
    }

    public function update(Request $request, $id)  : RedirectResponse
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'kegiatan' => $request->kegiatan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'pj' => $request->pj,
            'slug' => Carbon::parse($request->tanggal)->isoFormat('MMMM-Y'),
        ]);

        return redirect('/admin/kegiatan')->with('success', 'Alhamdulillah, kegiatan berhasil diperbarui');
    }

    public function ubah(Request $request, $id) : RedirectResponse
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'ket' => $request->ket
        ]);

        return redirect('/admin/kegiatan')->with('success', 'Alhamdulillah, kegiatan berhasil terlaksana');
    }

    public function hapus($id): RedirectResponse
    {
        //get post by ID
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->delete();

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin menghapus data terpilih?";
        confirmDelete($title, $text);

        //redirect to index
        return redirect(route('kegiatan.index'))->with('success', 'Alhamdulillah, kegiatan berhasil dihapus!');
    }

    public function kegiatan_list(Request $request, $slug)
    {
        $kegiatan = Kegiatan::all();

        return view('kegiatan.kegiatan', compact('kegiatan'));
    }


    public function list_kegiatan(Request $request, $slug)
    {
        $events = Kegiatan::all();

        return view('keg', compact('events'));
    }

}
