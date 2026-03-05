<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty();
    }

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
