<?php

namespace App\Models\Kehadiran;

use Illuminate\Database\Eloquent\Model;

class BarokahPustakawan extends Model
{
    protected $table = 'barokah_pustakawans';

    protected $guarded = ['id'];

    public function pegawai () {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
