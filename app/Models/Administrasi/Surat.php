<?php

namespace App\Models\Administrasi;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surats';

    protected $guarded = ['id'];

    protected $casts = [
        'isi' => 'array', // Otomatis mengubah JSON ke array saat diambil dari database
    ];
}
