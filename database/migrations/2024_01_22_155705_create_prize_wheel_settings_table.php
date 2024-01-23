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
        Schema::create('prize_wheel_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('prize_wheel_events')->cascadeOnDelete();
            $table->string('facebook_state')->nullable();
            $table->string('background_pc');
            $table->string('background_mobile');
            $table->string('background_wheel');
            $table->string('background_spin');
            $table->boolean('auto_messenger')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prize_wheel_settings');
    }
};
