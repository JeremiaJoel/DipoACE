<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'kodemk',
        'sks',
        'semester',
        'jenis_matkul'
    ];
}
