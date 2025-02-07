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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garden_id')->constrained()->cascadeOnDelete();
            $table->foreignId('species_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('common_name')->nullable();
            $table->string('scientific_name')->nullable();
            $table->text('description')->nullable();
            $table->string('habitat')->nullable();
            $table->string('chemical_compounds')->nullable();
            $table->string('qr_image')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
