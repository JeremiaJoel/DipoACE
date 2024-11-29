<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
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
}
