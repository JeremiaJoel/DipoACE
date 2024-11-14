<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen', 
        'ruang',
        'matakuliah',
        'waktu',
        'kelas',
        'semester_aktif',
        'jurusan'
];
}
