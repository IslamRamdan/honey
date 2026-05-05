<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('blogs')) {
            return;
        }

        foreach ($this->seoColumns() as $column) {
            if (Schema::hasColumn('blogs', $column)) {
                DB::statement("ALTER TABLE `blogs` MODIFY `{$column}` MEDIUMTEXT NULL");
            }
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('blogs')) {
            return;
        }

        foreach ($this->seoColumns() as $column) {
            if (Schema::hasColumn('blogs', $column)) {
                DB::statement("ALTER TABLE `blogs` MODIFY `{$column}` VARCHAR(255) NULL");
            }
        }
    }

    private function seoColumns(): array
    {
        return [
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
    }
};
