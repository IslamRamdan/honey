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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->longText('meta_home_page')->nullable();
            $table->longText('meta_about')->nullable();
            $table->longText('meta_category')->nullable();
            $table->longText('meta_contact')->nullable();
            $table->longText('meta_news')->nullable();
            $table->longText('meta_blogs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
