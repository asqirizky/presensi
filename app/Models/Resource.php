<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Resource extends Model
{
    protected $table = 'resources';

    protected $guarded = ['id'];

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('prodi')
        ->saveSlugsTo('slug');
    }
}
