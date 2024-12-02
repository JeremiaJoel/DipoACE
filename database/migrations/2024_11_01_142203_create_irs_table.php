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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->string('ruang');
            $table->integer('sks')->default(0);
            $table->string('kodemk')->nullable();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('kelas');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->string('jurusan');
            $table->string('pengampu_1')->default('');
            $table->string('pengampu_2')->nullable();
            $table->string('pengampu_3')->nullable();
            $table->enum('status_irs', ['Belum Disetujui', 'Sudah Disetujui'])->default('Belum Disetujui');
            $table->enum('status_mk', ['Baru', 'Perbaikan'])->default('Baru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};