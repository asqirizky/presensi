<?php

namespace App\Models\Kehadiran;

use App\Models\Kehadiran\Jadwal;
use Illuminate\Database\Eloquent\Model;

class Libur extends Model
{
    protected $table = 'liburs';
    protected $guarded = ['id'];

    public function jadwals()
    {
        return $this->belongsToMany(Jadwal::class, 'libur_shift', 'libur_id', 'jadwal_id')->withPivot('tanggal')->withTimestamps();
    }
}
