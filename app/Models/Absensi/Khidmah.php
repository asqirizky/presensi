<?php

namespace App\Models\Absensi;

use App\Models\Absensi\Shift;
use Illuminate\Database\Eloquent\Model;

class Khidmah extends Model
{
    protected $table = 'khidmahs';
    protected $guarded = ['id'];

    // Relasi Many-to-Many dengan Shift
   public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'khidmah_shift');
    }

    public function izins()
    {
        return $this->hasMany(Izin::class, 'nik', 'nik');
    }

    public function barokah()
    {
        return $this->hasOne(Barokah::class, 'nik', 'nik');
    }

    public function absensi()
    {
        return $this->hasMany(Absen::class, 'nik', 'nik');
    }
}
