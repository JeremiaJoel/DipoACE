<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    Schema::create('approveclassroomss', function (Blueprint $table) {
        $table->id();
        $table->foreignId('classroom_id')->constrained('classroomss')->onDelete('cascade');
        $table->enum('status', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approveclassroomss');
    }
};
