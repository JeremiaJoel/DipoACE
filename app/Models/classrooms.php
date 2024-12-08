<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    use HasFactory;

    protected $table = 'classroomss';

    protected $fillable = ['kode_ruang', 'gedung', 'kapasitas', 'jurusan', 'status'];

    public function approval()
    {
        return $this->hasOne(ApproveClassroom::class, 'classroom_id');
    }
}