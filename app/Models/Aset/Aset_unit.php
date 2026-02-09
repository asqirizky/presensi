<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Model;

class Aset_unit extends Model
{
    //
    protected $table = 'aset_units';
    protected $guarded = ['id'];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }

    public function sumber()
    {
        return $this->belongsTo(Aset_sumber::class);
    }
    public function lokasi()
    {
        return $this->belongsTo(Aset_lokasi::class, 'lokasi_id');
    }

    public function pemeliharaan()
    {
        return $this->hasMany(Aset_pemeliharaan::class, 'unit_id');
    }
}
