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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name');
            $table->string('home_team');
            $table->string('away_team');
            $table->unsignedBigInteger('tournament_official_id');
            $table->string('game_referee');
            $table->string('game_location');
            $table->string('home_score');
            $table->string('away_score');
            $table->json('goal')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('verified_by_team1')->default(false)->nullable();
            $table->boolean('verified_by_team2')->default(false)->nullable();
            $table->boolean('verified')->default(false)->nullable();
            $table->timestamps();


            $table->foreign('tournament_official_id')
            ->references('user_id')
            ->on('tournament_officials')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
