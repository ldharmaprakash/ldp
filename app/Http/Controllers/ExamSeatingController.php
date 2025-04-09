<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // Fetch all students
        $students = \App\Models\Student::all();

        // Redirect back to the index view with the student data
        return redirect()->route('exam-seating.index', ['students' => $students])->with('success', 'Exam seating created successfully.');
    }
}
