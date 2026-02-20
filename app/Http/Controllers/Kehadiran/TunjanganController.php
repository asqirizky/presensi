<?php

namespace App\Http\Controllers\Kehadiran;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kehadiran\Anak;
use App\Models\Kehadiran\Jabatan;
use App\Models\Kehadiran\Kehormatan;
use App\Models\Kehadiran\RankDosen;
use App\Models\Kehadiran\TunjanganJabatan;
use App\Models\Kehadiran\TunjanganKehadiran;
use App\Models\Kehadiran\TunjanganPengabdian;
use App\Models\Kehadiran\Tunkel;
use App\Models\Province;

class TunjanganController extends Controller
{
    public function index () {

        if (request()->is('admin/kehadiran-tunjangan')) {

            $tunjangan = TunjanganKehadiran::get();

            return view('admin.Kehadiran.tunjangan.kehadiran.tunjangan_kehadiran', compact(
                'tunjangan'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-jabatan')) {

            $jabatan = Jabatan::where('status', 1)
                ->whereNotNull('eselon')
                ->where('eselon', '!=', '')
                ->orderBy('eselon', 'asc')
                ->get();

            $tunjanganJabatan = TunjanganJabatan::all();

            return view('admin.Kehadiran.tunjangan.jabatan.jabatan_tunjangan', compact(
                'jabatan',
                'tunjanganJabatan'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-pengabdian')) {

            $pengabdian = TunjanganPengabdian::all();

            return view('admin.Kehadiran.tunjangan.pengabdian.pengabdian', compact(
                'pengabdian'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-tunkel')) {

            $tunkel = Tunkel::all();

            return view('admin.Kehadiran.tunjangan.tunkel.tunkel', compact(
                'tunkel'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-kehormatan')) {

            $kehormatan = Kehormatan::all();

            return view('admin.Kehadiran.tunjangan.kehormatan.kehormatan', compact(
                'kehormatan'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-anak')) {

            $anak = Anak::all();

            return view('admin.Kehadiran.tunjangan.anak.anak', compact(
                'anak'
            ));
        }

        if (request()->is('admin/kehadiran-tunjangan-rankDosen')) {

            $rank = RankDosen::get();

            return view('admin.Kehadiran.tunjangan.rank_dosen.rank_dosen', compact(
                'rank',
            ));
        }

    }

    public function store(Request $request) {

        if (request()->is('admin/kehadiran-tunjangan')) {

            $request->validate([
                'tempatTinggal' => 'required|string|max:255',
                'tunjangan'     => 'required|string|max:255',
            ]);

            // Simpan data
            TunjanganKehadiran::create([
                'tempatTinggal' => $request->tempatTinggal,
                'tunjangan'     => $request->tunjangan,
                'APBM'          => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil ditambahkan');
        }

        if (request()->is('admin/kehadiran-tunjangan-jabatan')) {

            $request->validate([
                'nama_jabatan' => 'required|string|max:255',
                'tunjangan_jabatan' => 'required|string|max:255',
            ]);

            TunjanganJabatan::create([
                'nama_jabatan' => $request->nama_jabatan,
                'tunjangan_jabatan' => $request->tunjangan_jabatan,
                'APBM' => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil ditambahkan');
        }

        if (request()->is('admin/kehadiran-tunjangan-pengabdian')) {

            TunjanganPengabdian::create([
                'tunjangan_pengabdian' => $request->tunjangan_pengabdian,
                'APBM' => $request->APBM
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }

        if ($request->is('admin/kehadiran-tunjangan-tunkel')) {

            Tunkel::create([
                'tunkel' => $request->tunkel,
                'APBM' => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }

        if ($request->is('admin/kehadiran-tunjangan-kehormatan')) {

            Kehormatan::create([
                'tunjangan_kehormatan' => $request->tunjangan_kehormatan,
                'APBM' => $request->APBM
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }

        if ($request->is('admin/kehadiran-tunjangan-anak')) {

            Anak::create([
                'tunjangan_anak' => $request->tunjangan_anak,
                'APBM' => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }

        if ($request->is('admin/kehadiran-tunjangan-rankDosen')) {
            
            RankDosen::create([
                'tahun' => $request->tahun,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'APBM' => $request->APBM,
                't_rank_dosen' => $request->t_rank_dosen,
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }
    }

    public function update(Request $request, $id) {

        if ($request->is('admin/kehadiran-tunjangan/*')) {

            $tunjangan = TunjanganKehadiran::findOrFail($id);

            $request->validate([
                'tunjangan' => 'required|string|max:255',
            ]);

            $tunjangan->update([
                'tunjangan' => $request->tunjangan,
                'APBM'      => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        }

        if ($request->is('admin/kehadiran-tunjangan-jabatan/*')) {

            $tunjanganJabatan = TunjanganJabatan::findOrFail($id);

            $tunjanganJabatan->update([
                'jabatan' => $request->jabatan,
                'tunjangan_jabatan' => $request->tunjangan_jabatan,
                'APBM' => $request->APBM,
            ]); 

            return back()->with('success', 'Data berhasil diperbarui');
        }

        if ($request->is('admin/kehadiran-tunjangan-pengabdian/*')) {

            $pengabdian = TunjanganPengabdian::findOrFail($id);

            $pengabdian->update([
                'tunjangan_pengabdian' => $request->tunjangan_pengabdian,
                'APBM'  => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil disimpan');
        }

        if ($request->is('admin/kehadiran-tunjangan-tunkel/*')) {

            $tunkel = Tunkel::findOrFail($id);

            $tunkel->update([
                'tunkel' => $request->tunkel,
                'APBM' => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        }

        if ($request->is('admin/kehadiran-tunjangan-kehormatan/*')) {

            $kehormatan = Kehormatan::findOrFail($id);

            $kehormatan->update([
                'tunjangan_kehormatan' => $request->tunjangan_kehormatan,
                'APBM' => $request->APBM,
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        }

        if ($request->is('admin/kehadiran-tunjangan-anak/*')) {

            $anak = Anak::findOrFail($id);

            $anak->update([
                'tunjangan_anak' => $request->tunjangan_anak,
                'APBM' => $request->APBM,
            ]); 

            return back()->with('success', 'Data berhasil diperbarui');
        }

        if ($request->is('admin/kehadiran-tunjangan-rankDosen/*')) {
            
            $rankDosen = RankDosen::findOrFail($id);

            $rankDosen->update([
                'tahun' => $request->tahun,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'APBM' => $request->APBM,
                't_rank_dosen' => str_replace(',', '', $request->t_rank_dosen),
            ]);

            return back()->with('success', 'Data berhasil diperbarui');
        }
    }

    public function destroy($id) {

        if (request()->is('admin/kehadiran-tunjangan/*/hapus')) {

            $tunjangan = TunjanganKehadiran::findOrFail($id);

            $tunjangan->delete($id);

            return back()->with('success', 'Data berhasil dihapus');
        }

        if (request()->is('admin/kehadiran-tunjangan-jabatan/*/hapus')) {

            $tunjanganJabatan = TunjanganJabatan::findOrFail($id);

            $tunjanganJabatan->delete();

            return back()->with('success', 'Data berhasil dihapus');
        }

        if (request()->is('admin/kehadiran-tunjangan-pengabdian/*/hapus')) {

            $pengabdian = TunjanganPengabdian::findOrFail($id);

            $pengabdian->delete();

            return back()->with('success', 'Data berhasil dihapus');
        }

        if (request()->is('admin/kehadiran-tunjangan-tunkel/*/hapus')) {

            $tunkel = Tunkel::findOrFail($id);

            $tunkel->delete();

            return back()->with('success', 'Data berhasil dihapus');
        }

        if (request()->is('admin/kehadiran-tunjangan-kehormatan/*/hapus')) {

            $kehormatan = Kehormatan::findOrFail($id);

            $kehormatan->delete();

            return back()->with('success', 'Data berhasil dihapus');
        }

        if (request()->is('admin/kehadiran-tunjangan-anak/*/hapus')) {

            $anak = Anak::findOrFail($id);

            $anak->delete();

            return back()->with('success', 'Data berhasil dihapus');
        }
    }

}
