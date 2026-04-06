<?php

namespace App\Models\Master;

use App\Models\Master\Ruang;
use Illuminate\Database\Eloquent\Model;

class Pustakawan extends Model
{
    protected $table = 'pustakawans';

    protected $guarded = ['id'];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function jabatan() 
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id', 'eselon');
    }

    public function jadwal() 
    {
        return $this->hasMany(PustakawanJadwal::class, 'pustakawan_id', 'id');
    }
}
