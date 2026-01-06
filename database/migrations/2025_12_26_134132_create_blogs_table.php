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
