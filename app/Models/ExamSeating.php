<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSeating extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_name',
        'seating_arrangement',
    ];
}
