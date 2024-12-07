<?php

namespace App\Models;

use App\Models\Matakuliah;
use App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [
        'ruang',
        'kelas',
        'semester_aktif',
        'jurusan',
        'sks',
        'hari',
        'pengampu_1',
        'pengampu_2',
        'pengampu_3',
        'kodemk',
        'jam_mulai',
        'jam_selesai'

    ];

    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class);
    }

    public function dosen()
    {
        return $this->belongsToMany(dosen::class, 'dosen_jadwal', 'jadwal_id', 'dosen_id');
    }
    public function approval()
    {
        return $this->hasOne(approvejadwal::class, 'jadwal_id');
    }
}
