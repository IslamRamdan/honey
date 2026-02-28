<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    //
    protected $table = 'seo_meta';

    protected $fillable = [
        'page',
        'title_ar',
        'title_en',
        'title_fr',
        'title_es',
        'description_ar',
        'description_en',
        'description_fr',
        'description_es',
        'keywords_ar',
        'keywords_en',
        'keywords_fr',
        'keywords_es',
        'image',
    ];
}
