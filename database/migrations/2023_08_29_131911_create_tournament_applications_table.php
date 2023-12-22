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
        Schema::create('tournament_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tournament_name');
            $table->integer('team_id');
            $table->integer('tournament_creator');
            $table->text('comment');
            $table->string('status')->default('Pending')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_applications');
    }
};
