<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            // الاسم بعدة لغات
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('name_es');

            // الوصف بعدة لغات
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('description_fr');
            $table->text('description_es');

            // الصورة والحالة
            $table->string('image')->nullable();
            $table->json('images')->nullable();

            $table->json('videos')->nullable();

            $table->enum('status', ['new', 'blog'])->default('new');


            // ---------------- SEO -----------------
            $table->string('seo_title_ar')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->string('seo_title_fr')->nullable();
            $table->string('seo_title_es')->nullable();

            $table->text('seo_description_ar')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->text('seo_description_fr')->nullable();
            $table->text('seo_description_es')->nullable();

            $table->string('seo_keywords_ar')->nullable();
            $table->string('seo_keywords_en')->nullable();
            $table->string('seo_keywords_fr')->nullable();
            $table->string('seo_keywords_es')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
