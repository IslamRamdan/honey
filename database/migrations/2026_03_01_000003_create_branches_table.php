<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('country_en');
            $table->string('country_ar');
            $table->string('country_es')->nullable();
            $table->string('country_fr')->nullable();
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('description_es')->nullable();
            $table->text('description_fr')->nullable();
            $table->string('country_code')->nullable(); // ISO code for map
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
