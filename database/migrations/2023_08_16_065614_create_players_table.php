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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture');
            $table->string('type_of_sport');
            $table->string('player_position');
            $table->string('player_team')->default('Free agent')->nullable();
            $table->string('player_status')->default('pending');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
