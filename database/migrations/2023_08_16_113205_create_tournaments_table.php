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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name');
            $table->json('tournament_teams')->nullable();
            $table->json('tournament_referees')->nullable();
            $table->integer('tournament_creator')->nullable();
            $table->date('start_application_date');
            $table->date('application_deadline_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
