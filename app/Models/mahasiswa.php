<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'email',
        'tanggal_lahir',
        'no_hp',  
        'pembimbing_akademik'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_akademik', 'nip');
    }
}
