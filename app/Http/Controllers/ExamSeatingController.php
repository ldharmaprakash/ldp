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
            'department' => 'nullable|string',
            'year' => 'nullable|integer',
            'regno_start' => 'nullable|string',
            'regno_end' => 'nullable|string',
        ]);

        // Normalize input values
        $department = $validated['department'] ?? null;
        $year = $validated['year'] ?? null;
        $regno_start = $validated['regno_start'] ?? null;
        $regno_end = $validated['regno_end'] ?? null;

        // Build the query
        $query = \App\Models\Student::query();

        if ($department) {
            $query->where('department', $department);
        }

        if ($year) {
            $query->where('year', $year);
        }

        if ($regno_start && $regno_end) {
            $query->whereBetween('register_number', [$regno_start, $regno_end]);
        } elseif (!$regno_start && !$regno_end) {
            $query->whereNotNull('register_number');
        }

        // Fetch all students if no filters are applied
        $students = $query->get();

        // Log the fetched students for debugging
        \Log::info('Fetched Students:', $students->toArray());

        // Return the view with the filtered student data
        return view('exam-seating.index', compact('students'));
    }

    public function getStudentsByDepartmentAndYear(Request $request)
    {
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
