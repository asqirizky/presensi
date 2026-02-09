<?php

namespace App\Models\Absensi;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';
    protected $guarded = ['id'];

    // Relationship Khidmah
    public function khidmahs(){
        return $this->belongsToMany(Khidmah::class, 'khidmah_shift');
    }

    // Relationship Izin
    public function izins(){
        return $this->belongsToMany(Izin::class, 'izin_shift', 'shift_id', 'izin_id');
    }

    public function holidays()
    {
        return $this->belongsToMany(Holiday::class, 'holiday_shift', 'holildya_id', 'shift_id');
    }

    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'holiday_shift', 'holiday_id', 'shift_id');
    }

}
