<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrsMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'irs_mahasiswa'; // Nama tabel

    // Relasi ke tabel mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'nim');
    }

    public function details()
    {
        return $this->hasMany(Irs::class, 'nim', 'nim');
    }
}
