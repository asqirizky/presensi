<?php

namespace App\Models\Kehadiran;

use Illuminate\Database\Eloquent\Model;

class TunjanganJabatan extends Model
{
    protected $table = 'tunjangan_jabatans';
    protected $guarded = ['id'];

    public function jabatanRelation()
    {
        return $this->belongsTo(Jabatan::class, 'nama_jabatan', 'nama_jabatan');
    }
}
