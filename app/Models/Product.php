<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty();
    }

    protected $fillable = [
        'category_id',
        'title_ar',
        'title_en',
        'title_fr',
        'title_es',
        'description_ar',
        'description_en',
        'description_fr',
        'description_es',
        'images',
        'sizes_ar',
        'sizes_en',
        'sizes_fr',
        'sizes_es',
    ];

    protected $casts = [
        'images'   => 'array',
        'sizes_ar' => 'array',
        'sizes_en' => 'array',
        'sizes_fr' => 'array',
        'sizes_es' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
