<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'nama',
        'nip',
        'email',
        'jurusan',
=======
        'nama', 
        'nip',
        'email',
        'jurusan'.
>>>>>>> 97c510d96f8fcb640e3751d594e2403ecf24cfeb
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_handphone'
    ];
<<<<<<< HEAD

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'pembimbing_akademik', 'nip');
    }
=======
>>>>>>> 97c510d96f8fcb640e3751d594e2403ecf24cfeb
}
