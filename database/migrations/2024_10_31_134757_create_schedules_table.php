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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('ruang'); 
            $table->string('matakuliah');
            $table->string('waktu'); 
            $table->string('kelas');
            $table->string('semester_aktif');
            $table->string('jurusan');
            $table->string('pengampu_1'); 
            $table->string('pengampu_2'); 
            $table->string('pengampu_3')-> nullable(); 
            $table->enum('status', ['Belum Disetujui', 'Sudah Disetujui'])->default('Belum Disetujui');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
