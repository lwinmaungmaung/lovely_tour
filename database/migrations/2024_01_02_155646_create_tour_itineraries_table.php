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
        Schema::create('tour_itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->references('id')->on('tours')->cascadeOnDelete();
            $table->foreignId('day_id')->references('id')->on('tour_itinerary_days')->cascadeOnDelete();
            $table->time('begin');
            $table->time('end')->nullable();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->json('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_itineraries');
    }
};
