<?php

namespace App\Models\Kehadiran;

use App\Models\Kehadiran\PegawaiJadwal;
use App\Models\Master\Jabatan;
use App\Models\Master\Ruang;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasMany(PegawaiJadwal::class, 'pegawai_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

}
