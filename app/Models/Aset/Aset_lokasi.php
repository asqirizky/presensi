<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Model;

class Aset_lokasi extends Model
{
    protected $table = 'aset_lokasis';

    protected $guarded = ['id'];

    public function units()
    {
        return $this->hasMany(Aset_unit::class, 'lokasi_id');
    }
}
