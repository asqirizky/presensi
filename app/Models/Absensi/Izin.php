<?php

namespace App\Models\Absensi;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izins';
    protected $guarded = ['id'];


    public function shifts(){
        return $this->belongsToMany(Shift::class, 'izin_shift', 'izin_id', 'shift_id');
    }

    public function khidmah(){
        return $this->belongsTo(Khidmah::class, 'nik', 'nik');
    }

}
