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
        Schema::create('current_rides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id')->unique();
            $table->foreign('driver_id')->references('id')->on('drivers')->cascadeOnDelete();
            $table->unsignedBigInteger('request_id')->unique();
            $table->foreign('request_id')->references('id')->on('ride_requests')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->boolean('isArrived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_rides');
    }
};
