<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    use HasFactory;

    protected $fillable = [
            'nama', 
            'ruang',
            'hari',
            'jam_mulai',
            'jam_selesai',
            'semester',
            'jurusan'
    ];
}
