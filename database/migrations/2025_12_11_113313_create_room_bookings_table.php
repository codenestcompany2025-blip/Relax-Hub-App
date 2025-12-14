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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('start_time')->default(now());
            $table->timestamp('end_time')->default(now());
            $table->tinyInteger('with_power')->default(0);
            $table->tinyInteger('with_internet')->default(0);
            $table->enum('status',['booked','finished','cancelled'])->default('booked');
            $table->float('price')->default(0.0);
            $table->float('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
