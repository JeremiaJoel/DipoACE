<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approvejadwal extends Model
{
    use HasFactory;

    protected $table = 'approvejadwal';

    protected $fillable = [
        'jadwal_id',
        'status',
    ];

    public function jadwal()
    {
        return $this->belongsTo(jadwal::class, 'jadwal_id');
    }

