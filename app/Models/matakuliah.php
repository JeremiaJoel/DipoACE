<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
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

    public function schedules()
    {
        return $this->hasMany(Jadwal::class);
    }
}
