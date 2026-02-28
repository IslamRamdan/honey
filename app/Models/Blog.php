<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'name_ar',
        'name_en',
        'name_fr',
        'name_es',
        'description_ar',
        'description_en',
        'description_fr',
        'description_es',
        'image',
        'images',   // ✅ أضف دي
        'videos',   // ✅ ودي
        'status',
        'seo_title_ar',
        'seo_title_en',
        'seo_title_fr',
        'seo_title_es',
        'seo_description_ar',
        'seo_description_en',
        'seo_description_fr',
        'seo_description_es',
        'seo_keywords_ar',
        'seo_keywords_en',
        'seo_keywords_fr',
        'seo_keywords_es',
    ];
    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
    public function seo($lang = 'ar')
    {
        return [
            'title' => $this->{'seo_title_' . $lang} ?? '',
            'description' => $this->{'seo_description_' . $lang} ?? '',
            'keywords' => $this->{'seo_keywords_' . $lang} ?? '',
        ];
    }
}
