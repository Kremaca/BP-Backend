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
        Schema::create('puzzle_header', function (Blueprint $table) {
            $table->id();
            $table->string('puzzleID');
            $table->string('name');
            $table->string('image');
            $table->unsignedBigInteger('puzzleSeason');
            $table->unsignedBigInteger('puzzleState');

            $table->foreign('puzzleSeason')->on('seasons')->references('id');
            $table->foreign('puzzleState')->on('puzzle_state')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puzzle_header');
    }
};
