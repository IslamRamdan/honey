<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // FontAwesome CSS class
            $table->string('number'); // target number e.g. "28000000"
            $table->string('display_text')->nullable(); // e.g. "28M+"
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_es')->nullable();
            $table->string('title_fr')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
