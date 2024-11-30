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
        'semester',
        'tahun_ajaran',
        'kodemk',
        // 'ruang',
        // 'status',
        // 'dosen_pengampu'
    ];

    public function khs()
    {
        return $this->hasMany(Khs::class, 'nim', 'nim');
    }
}
