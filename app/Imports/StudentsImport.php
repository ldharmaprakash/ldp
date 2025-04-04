namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'student_id' => $row[1],
            'department' => $row[2],
            'year' => $row[3],
            'batch' => $row[4],
            'gender' => $row[5],
            'dob' => $row[6],
            'mobile' => $row[7],
            'email' => $row[8],
            'address' => $row[9],
            'register_number' => $row[10],
        ]);
    }
}
