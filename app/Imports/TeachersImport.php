<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    public function model(array $row)
    {
        return new Teacher([
            'name' => $row[0],
            'teacher_id' => $row[1],
            'department' => $row[2],
            'gender' => $row[3],
            'dob' => $row[4],
            'mobile' => $row[5],
            'email' => $row[6],
            'address' => $row[7],
            'qualification' => $row[8],
        ]);
    }
}
