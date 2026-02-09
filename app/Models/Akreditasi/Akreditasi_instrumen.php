<?php

namespace App\Models\Akreditasi;

use Illuminate\Database\Eloquent\Model;

class Akreditasi_instrumen extends Model
{
    //
    protected $table = 'akreditasi_instrumens';
    protected $guarded = ['id'];

    public function kriterias()
    {
        return $this->belongsTo(Akreditasi_kriteria::class, 'kriteria');
    }
}
