<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use App\Models\Aset\Aset;
use App\Models\Aset\Aset_lokasi;
use App\Models\Aset\Aset_unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UnitController extends Controller
{
    public function index($aset_id)
    {
        $aset = Aset::with('units')->findOrFail($aset_id);

        return view('admin.Aset.aset.detailaset', compact('aset'));
    }

    // Form untuk menambahkan eksemplar baru
    public function create($aset_id)
    {
        $aset = Aset::findOrFail($aset_id);

        return view('admin.Aset.aset.editaset', compact('aset'));
    }

    //  Menyimpan eksemplar baru
    public function store(Request $request, $aset_id)
    {
        $aset = Aset::findOrFail($aset_id);

        // Validasi input
        $validated = $request->validate([
            'jumlah' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'kwitansi' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'kondisi' => 'required|in:Baik,Rusak,Hilang',
        ]);

        // Simpan file jika ada
        $fotoName = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/fotobarang', $foto->hashName());
            $fotoName = $foto->hashName();
        }

        $kwitansiName = null;
        if ($request->hasFile('kwitansi')) {
            $kwitansi = $request->file('kwitansi');
            $kwitansi->storeAs('public/kwitansi', $kwitansi->hashName());
            $kwitansiName = $kwitansi->hashName();
        }

        // Buat aset unit sesuai jumlah
        for ($i = 0; $i < $validated['jumlah']; $i++) {
            $kodeUnit = $this->generateKodeUnit($aset);

            Aset_unit::create([
                'aset_id' => $aset->id,
                'kode_unit' => $kodeUnit,
                'tanggal' => $request->tanggal,
                'lokasi_id' => $request->lokasi_id,
                'kondisi' => $validated['kondisi'],
                'sumber_id' => $request->sumber_id,
                'harga' => $request->harga,
                'nb' => $request->nb,
                'foto' => $fotoName,
                'kwitansi' => $kwitansiName,
            ]);
        }

        return back()->with('success', 'Alhamdulillah, Unit berhasil ditambahkan.');
    }


    // Mengubah kondisi unit
   public function update(Request $request, Aset_unit $unit, $id)
    {
        $unit = Aset_unit::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'kondisi' => 'required|in:Baik,Rusak,Hilang',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'kwitansi' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        // Simpan file jika ada
        $fotoName = $unit->foto; // default ke foto lama
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/fotobarang', $foto->hashName());
            $fotoName = $foto->hashName();
        }

        $kwitansiName = $unit->kwitansi; // default ke kwitansi lama
        if ($request->hasFile('kwitansi')) {
            $kwitansi = $request->file('kwitansi');
            $kwitansi->storeAs('public/kwitansi', $kwitansi->hashName());
            $kwitansiName = $kwitansi->hashName();
        }

        // Update data
        $unit->update([
            'tanggal' => $request->tanggal,
            'lokasi_id' => $request->lokasi_id,
            'kondisi' => $validated['kondisi'],
            'sumber_id' => $request->sumber_id,
            'harga' => $request->harga,
            'nb' => $request->nb,
            'foto' => $fotoName,
            'kwitansi' => $kwitansiName,
        ]);

        return back()->with('success', 'Alhamdulillah, Unit berhasil diperbarui.');
    }


    // // Menghapus eksemplar
    public function hapus(Aset_unit $unit, $id)
    {
        $unit = Aset_unit::findOrFail($id);

        $unit->delete();
        return back()->with('success', 'Alhamdulillah, Unit berhasil dihapus.');
    }
    public function detail(Aset_unit $unit, $id)
    {
        $unit = Aset_unit::findOrFail($id);

        return view('detailscanaset', compact('unit'));
    }

    public function export($lokasi_id)
    {
        $lokasi = Aset_lokasi::find($lokasi_id);

        // Jika tidak ada data yang ditemukan, berikan respon error
        if (!$lokasi) {
            return back()->with('error', 'Astaghfirullah, Tidak ada data lokasi yang ditemukan');
        }

        // Ambil data aset berdasarkan lokasi_id
        $unit = Aset_unit::where('lokasi_id', $lokasi_id)->get();

        // Jika tidak ada aset di lokasi tersebut
        if ($unit->isEmpty()) {
            return back()->with('error', 'Astaghfirullah, Tidak ada data yang ditemukan untuk lokasi yang dimaksud');
        }

        // Membuat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul dokumen
        $sheet->mergeCells('A1:J1'); // Menggabungkan sel untuk judul
        $sheet->setCellValue('A1', 'Laporan Data Aset di Lokasi: ' . $lokasi->lokasi);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan header tabel
        $headers = ['ID', 'No. Inventaris' , 'Nama', 'NB', 'Kategori', 'Volume', 'Harga', 'Tanggal Pembelian', 'Sumberdana' , 'Kondisi'];
        $colIndex = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($colIndex . '3', $header); // Baris header dimulai dari baris 3
            $sheet->getStyle($colIndex . '3')->getFont()->setBold(true);
            $sheet->getStyle($colIndex . '3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($colIndex . '3')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            $sheet->getStyle($colIndex . '3')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('03FCAD'); // Warna untuk header
            $colIndex++;
        }



        // Menulis data pengguna ke dalam sheet
        $row = 4; // Mulai dari baris kedua (setelah header)
        foreach ($unit as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->aset->kategori->kode.'/'. Carbon::parse($item->tanggal)->isoFormat('DD.MM.YY').'/'.$item->sumber->kode.'/'.str_pad($item->aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$item->kode_unit);
            $sheet->setCellValue('C' . $row, $item->aset->nama);
            $sheet->setCellValue('D' . $row, $item->nb);
            $sheet->setCellValue('E' . $row, $item->aset->kategori->kategori);
            $jumlah = Aset_unit::where('aset_id', $item->aset_id)->count();
            $sheet->setCellValue('F' . $row, $jumlah);
            $sheet->setCellValue('G' . $row, number_format($item->harga, 0, ',', '.'));
            $sheet->setCellValue('H' . $row, Carbon::parse($item->tanggal)->isoFormat('D MMMM Y'));
            $sheet->setCellValue('I' . $row, $item->sumber->sumberdana);
            $sheet->setCellValue('J' . $row, $item->kondisi);
            $row++;
        }

        // Menambahkan border pada tabel
        $lastRow = $row - 1;
        $sheet->getStyle('A3:J' . $lastRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Mengatur lebar kolom secara otomatis
        foreach (range('A', 'J') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Menulis file Excel menggunakan Xlsx Writer
        $writer = new Xlsx($spreadsheet);

        // Mengatur response agar file bisa diunduh langsung oleh pengguna
        $fileName = 'Data_Aset_lokasi_' . $lokasi->lokasi . '.xlsx'; // Nama file berdasarkan kategori
        return response()->stream(
            function() use ($writer) {
                $writer->save('php://output'); // Menyimpan file ke output
            },
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                'Cache-Control' => 'max-age=0',
            ]
        );
    }


    // Fungsi untuk membuat kode eksemplar otomatis
    private function generateKodeUnit(Aset $aset)
    {
        $lastUnit = Aset_unit::where('aset_id', $aset->id)
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = $lastUnit ? (int)substr($lastUnit->kode_unit, -4) : 0;
        $newNumber = $lastNumber + 1;

        return str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }





}
