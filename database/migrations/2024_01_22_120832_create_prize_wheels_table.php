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
        Schema::create('prize_wheels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('prize_wheel_events')->cascadeOnDelete();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('fill_color');
            $table->string('text_color');
            $table->string('image')->nullable();
            $table->integer('probability')->default(10)->nullable();
            $table->boolean('is_win')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prize_wheels');
    }
};
