<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g. about-brief, vision, mission, etc.
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_es')->nullable();
            $table->string('title_fr')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ar')->nullable();
            $table->longText('content_es')->nullable();
            $table->longText('content_fr')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->nullable(); // FontAwesome class
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
