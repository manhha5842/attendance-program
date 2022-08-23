<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone',
        'gender',
        'address',
        'department_id',
        'birthday',
    ];
}
