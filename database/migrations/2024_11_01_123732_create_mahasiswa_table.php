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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama');
            // $table->string('semester');
            // $table->float('ipk');
            // $table->integer('sks');
            $table->string('jurusan');
            $table->string('email');
            $table->string('tanggal_lahir');
            $table->string('no_hp');
            $table->string('status');
            $table->string('pembimbing_akademik');
            $table->foreignId('dosen_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
