<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    //
    protected $fillable = [
        'meta_home_page',
        'meta_about',
        'meta_category',
        'meta_contact',
        'meta_news',
        'meta_blogs',
    ];
}
