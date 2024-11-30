<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khs extends Model
{
    use HasFactory;
    
    protected $table = 'khs';

    protected $fillable = [
        'nim',
        'semester',
        'tahun_ajaran',
        'kodemk',
        'matakuliah',
        'jenis',
        'status_mk',
        'sks',
        'nilai_huruf',
        'bobot' .
        'sks_x_bobot',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kodemk', 'kodemk');
    }

    public function irs()
    {
        return $this->belongsTo(Irs::class, 'nim', 'nim');
    }
}
