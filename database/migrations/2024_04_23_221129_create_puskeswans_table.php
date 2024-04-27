<?php

use App\Models\dokterhewan;
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
        Schema::create('puskeswan', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('puskeswan');
            $table->string('telepon');
            $table->foreignId('id_alamat')->constrained('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puskeswan');
    }
};
