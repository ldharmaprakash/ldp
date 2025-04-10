<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ExamSeatingController extends Controller
{
    public function index(Request $request)
    {
        $students = $request->get('students', []); // Default to an empty array if no students are passed
        return view('exam-seating.index', compact('students'));
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'department' => 'required|string',
            'year' => 'required|integer',
            'regno_start' => 'required|integer',
            'regno_end' => 'required|integer',
        ]);

       
    }
    public function getStudents()
    {
        // Fetch all students from the database
        $students = Student::
            select('id', 'name', 'student_id', 'department', 'year', 'batch', 'gender', 'register_number')
            ->get();    
        // Debugging: Log the fetched students
        \Log::info('Fetched Students:', $students->toArray());


        // Return the data as JSON
        return response()->json($students);
    }
    
}
