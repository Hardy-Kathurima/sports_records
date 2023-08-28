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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->default('Free agent')->nullable();
            $table->string('team_logo')->nullable();
            $table->unsignedBigInteger('team_official_id');
            $table->json('team_players')->nullable();
            $table->json('team_officials')->nullable();
            $table->timestamps();

            $table->foreign('team_official_id')
            ->references('user_id')
            ->on('team_officials')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
