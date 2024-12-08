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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('ruang');
            $table->integer('sks')->default(0);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('hari');
            $table->string('kelas');
            $table->string('semester_aktif');
            $table->string('jurusan');
            $table->string('pengampu_1')->default('');
            $table->string('pengampu_2')->default('');
            $table->string('pengampu_3')->nullable();
            $table->enum('status', ['Belum Disetujui', 'Sudah Disetujui'])->default('Belum Disetujui');
            $table->timestamps();
            $table->string('kodemk')->nullable();
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            // foreign key constraint
            $table->foreign('kodemk')
                ->references('kodemk')
                ->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
