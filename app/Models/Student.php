<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id',
        'department',
        'year',
        'batch',
        'gender',
        'dob',
        'mobile',
        'email', // Add email to fillable
        'address',
        'register_number',
        'user_id',
    ];
}
