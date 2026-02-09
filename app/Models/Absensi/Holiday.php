<?php

namespace App\Models\Absensi;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $guarded = ['id'];

    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'holiday_shift', 'holiday_id', 'shift_id' );
    }
}
