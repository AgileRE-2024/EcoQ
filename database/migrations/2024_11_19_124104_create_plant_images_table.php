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
        Schema::create('plant_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained()->cascadeOnDelete(); // Relasi ke tabel plants
            $table->string('image_url'); // Menyimpan URL atau path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_images');
    }
};
