<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('irs_mahasiswa', function (Blueprint $table) {
        $table->id();
        $table->string('mahasiswa_id'); // Ubah tipe menjadi string, karena nim bertipe string
        $table->string('periode');
        $table->string('status')->default('Belum Disetujui');
        $table->timestamp('tanggal_submit')->nullable();
        $table->timestamps();

        // Menghubungkan mahasiswa_id dengan nim yang bertipe string
        $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa')->onDelete('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs_mahasiswa');
    }
};
