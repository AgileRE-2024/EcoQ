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
        Schema::create('pharmocology_aspects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained()->cascadeOnDelete();
            $table->text('toxicity');
            $table->text('contraindications');
            $table->text('warnings');
            $table->text('precautions');
            $table->text('side_effects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmocology_aspects');
    }
};
