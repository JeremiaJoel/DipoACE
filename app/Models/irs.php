<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodemk', 
        'matakuliah',
        'kelas',
        'sks',
        'ruang',
        'status',
        'dosen_pengampu'
    ];
}