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
        Schema::create('dinaspeternakan', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('nama');
            $table->foreignId('id_pengguna')->constrained('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinaspeternakan');
    }
};
