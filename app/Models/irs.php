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
<<<<<<< HEAD
        'status_irs', 
        'status_mk'
=======
        'status_irs',
        'status_mk',
        
>>>>>>> 20fd4a511fac639243745b73813a50cde8374f9c
    ];

    public function khs()
    {
        return $this->hasMany(Khs::class, 'nim', 'nim');
    }
}
