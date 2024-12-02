<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $fillable = [
        'nim',
        'ruang',
        'sks',
        'kodemk',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'kelas',
        'semester',
        'tahun_ajaran',
        'jurusan',
        'pengampu_1',
        'pengampu_2',
        'pengampu_3',
        'status_irs',
        'status_mk',
        
    ];

    public function khs()
    {
        return $this->hasMany(Khs::class, 'nim', 'nim');
    }
}
