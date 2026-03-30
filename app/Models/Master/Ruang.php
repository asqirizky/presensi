<?php

namespace App\Models\Master;

use App\Models\Master\Libur;
use App\Models\Master\Pustakawan;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruangs';

    protected $guarded = ['id'];

    public function pustakawan()
    {
        return $this->hasMany(Pustakawan::class);
    }

    public function libur()
    {
        return $this->belongsTo(Libur::class);
    } 
}
