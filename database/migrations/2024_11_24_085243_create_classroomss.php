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
        Schema::create('classroomss', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruang');
            $table->string('gedung');
            $table->string('kapasitas');
            $table->string('jurusan');
            $table->enum('status', ['Belum Disetujui', 'Sudah Disetujui'])->default('Belum Disetujui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroomss');
    }
};
