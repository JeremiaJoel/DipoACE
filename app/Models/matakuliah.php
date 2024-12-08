<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $fillable = [
        'nama',
        'jurusan',
        'kodemk',
        'sks',
        'semester',
        'jenis_matkul'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kodemk', 'kodemk');
    }

    public function khs()
    {
        return $this->hasMany(Khs::class, 'kodemk', 'kodemk');
    }

    public function irs()
    {
        return $this->hasMany(irs::class, 'kodemk', 'kodemk');
    }
}
