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
        Schema::create('actors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBiginteger('cast_id');
            $table->foreign('cast_id')->references('id')->on('cast');
            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');
            $table->string('role', length:255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
