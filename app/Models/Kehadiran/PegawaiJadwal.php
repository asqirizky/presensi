<?php

namespace App\Models\Kehadiran;

use Illuminate\Database\Eloquent\Model;

class PegawaiJadwal extends Model
{
    protected $table = 'pegawai_jadwal';

    protected $guarded = ['id'];

    public function pegawai() {

        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'pegawai_jadwal');
    }

    public function izinPegawais() {

        return $this->belongsToMany(IzinPegawai::class, 'izin_pegawai_jadwal', 'jadwal_id', 'izin_pegawai_id')->withPivot('tanggal');
    }
}
