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
        Schema::create('dokterhewan', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('nama');
            $table->foreignId('id_puskeswan')->nullable()->constrained('puskeswan')->nullOnDelete();
            $table->foreignId('id_pengguna')->constrained('pengguna');
        });
    }

    /**
     * Reverse the migrations.s
     */
    public function down(): void
    {
        Schema::dropIfExists('dokterhewan');
    }
    
};
