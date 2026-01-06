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
    ];
    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
}
