<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id', // Add teacher_id to the fillable array
        'department',
        'gender',
        'dob',
        'mobile',
        'email',
        'address',
        'qualification',
        'user_id',
    ];
}
