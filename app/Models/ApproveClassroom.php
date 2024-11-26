<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveClassroom extends Model
{
    use HasFactory;

    protected $table = 'approveclassroomss';

    protected $fillable = [
        'classroom_id',
        'status',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
