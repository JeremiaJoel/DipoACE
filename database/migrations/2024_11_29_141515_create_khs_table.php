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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->string('nim'); // Ganti foreignId menjadi string
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->string('kodemk');
            $table->string('matakuliah');
            $table->string('jenis');
            $table->string('status_mk');
            $table->integer('sks');
            $table->string('nilai_huruf');
            $table->integer('bobot');
            $table->integer('sks_x_bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
