<?php

namespace App\Models\Kehadiran;

use App\Models\Absensi\Shift;
use Illuminate\Database\Eloquent\Model;

class IzinPegawai extends Model
{
    protected $table = 'izin_pegawais';

    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'izin_pegawai_jadwal', 'izin_pegawai_id', 'jadwal_id')
            ->withPivot('tanggal')
            ->withTimestamps();
    }

    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'izin_pegawai_jadwal', 'izin_pegawai_id', 'jadwal_id')->withPivot('tanggal');
    }
}
