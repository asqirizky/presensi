<?php

namespace App\Models\Master;

use App\Models\Kehadiran\IzinPegawai;
use App\Models\Kehadiran\Libur;
use App\Models\Kehadiran\Pegawai;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected  $table = 'jadwals';

    protected $guarded = ['id'];

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'pegawai_jadwal', 'jadwal_id', 'pegawai_id');
    }

    public function izinPegawai()
    {
        return $this->belongsToMany(IzinPegawai::class, 'izin_pegawai_jadwal', 'jadwal_id', 'izin_pegawai_id')->withPivot('tanggal');
    }

    public function liburs()
    {
        return $this->belongsToMany(Libur::class, 'libur_shift', 'jadwal_id', 'libur_id')->withPivot('tanggal')->withTimestamps();
    }

}