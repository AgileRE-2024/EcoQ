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
        Schema::create('classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained()->cascadeOnDelete();
            $table->string('kingdom');
            $table->string('division');
            $table->string('class');
            $table->string('order');
            $table->string('family');
            $table->string('genus');
            $table->string('species');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};
