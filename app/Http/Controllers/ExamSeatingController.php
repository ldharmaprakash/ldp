<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamSeatingController extends Controller
{
    public function index()
    {
        return view('exam-seating.index');
    }

    public function store(Request $request)
    {
        // Handle form submission logic here
        $validated = $request->validate([
            'department' => 'required|string',
            'year' => 'required|integer',
            'regno_start' => 'required|integer',
            'regno_end' => 'required|integer',
        ]);

        // Save or process the data
        // ...

        return redirect()->route('exam-seating.index')->with('success', 'Exam seating created successfully.');
    }
}
