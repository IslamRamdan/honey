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
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->id();

            $table->string('page')->unique(); // home, about, products

            // Title لكل لغة
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('title_es')->nullable();

            // Description لكل لغة
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_es')->nullable();

            // Keywords لكل لغة
            $table->string('keywords_ar')->nullable();
            $table->string('keywords_en')->nullable();
            $table->string('keywords_fr')->nullable();
            $table->string('keywords_es')->nullable();

            // صورة OG واحدة تكفي لجميع اللغات
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_meta');
    }
};
