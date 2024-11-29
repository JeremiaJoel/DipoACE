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
        Schema::create('dosen_jadwal', function (Blueprint $table) {
            $table->foreignId('dosen_id')->constrained('dosen')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_jadwal');
    }
};
