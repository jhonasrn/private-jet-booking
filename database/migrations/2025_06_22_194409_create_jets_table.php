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
        Schema::create('jets', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('manufacturer');
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('range_km');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jets');
    }
};
