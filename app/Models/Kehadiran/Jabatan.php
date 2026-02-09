<?php

namespace App\Models\Kehadiran;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $guarded = ['id'];

    public function tunjangan ()
    {
        return $this->hasMany(TunjanganJabatan::class, 'nama_jabatan', 'nama_jabatan');
    }

}
