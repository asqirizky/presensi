<?php

namespace App\Models\Kehadiran;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shift;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $guarded = ['id'];

    public function jadwals()
    {
        return $this->hasMany(PegawaiJadwal::class, 'pegawai_id', 'pegawai_jadwal');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

}
