<?php

namespace App\Models\Absensi;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absens';
    protected $guarded = ['id'];

    public function khidmah()
    {
        return $this->belongsTo(Khidmah::class, 'nik', 'nik');
    }


    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
