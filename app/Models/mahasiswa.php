<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim'; // Primary key
    public $incrementing = false; // Jika primary key bukan integer auto increment
    protected $keyType = 'string';
    protected $fillable = [
        'nama',
        'nim',
        'jurusan',
        'email',
        'tanggal_lahir',
        'no_hp',
        'pembimbing_akademik',
        'status'
    ];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }

    public function khs()
    {
        return $this->hasMany(Khs::class, 'nim', 'nim');
    }
}
