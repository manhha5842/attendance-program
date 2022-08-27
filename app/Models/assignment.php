<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'course_id',
        'classroom_id',
        'lecturer_id',
        'room_id',
        'shift',
        'weekday',
    ];
}
