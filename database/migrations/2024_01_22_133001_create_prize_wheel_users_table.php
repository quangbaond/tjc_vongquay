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
        Schema::create('prize_wheel_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('prize_wheel_events')->cascadeOnDelete();
            $table->string('phone');
            $table->string('prize')->nullable();
            $table->string('full_name');
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prize_wheel_users');
    }
};
