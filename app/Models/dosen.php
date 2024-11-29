<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_handphone',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class, 'dosen_id', 'id');
    }


    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'dosen_jadwal', 'dosen_id', 'jadwal_id');
    }
}
