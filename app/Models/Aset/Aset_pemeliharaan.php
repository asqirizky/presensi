<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Model;

class Aset_pemeliharaan extends Model
{
    //
    protected $table = 'aset_pemeliharaans';
    protected $guarded = ['id'];

    public function unit()
    {
        return $this->belongsTo(Aset_unit::class, 'unit_id');
    }
}
