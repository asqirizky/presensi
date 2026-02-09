<?php

namespace App\Models\Aset;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    //
    protected $table = 'asets';

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Aset_kategori::class);
    }
    public function units()
    {
        return $this->hasMany(Aset_unit::class, 'aset_id');
    }
}
