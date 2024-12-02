<?php

namespace App\Models;

use App\Models\Matakuliah;
use App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [
        'ruang',
        'matakuliah',
        'waktu',
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'semester_aktif',
        'jurusan',
        'pengampu_1',
        'pengampu_2',
        'pengampu_3'

    ];

    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class,'kodemk', 'kodemk');
    }

    public function dosen()
    {
        return $this->belongsToMany(dosen::class, 'dosen_jadwal', 'jadwal_id', 'dosen_id');
    }
}
