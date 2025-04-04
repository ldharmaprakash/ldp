<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $main_title = 'Exams';
        $sub_title = 'Manage Exams';

        return view('exams.index', compact('exams', 'main_title', 'sub_title'));
    }

    public function create()
    {
        $main_title = 'Exams';
        $sub_title = 'Add Exam';

        return view('exams.add', compact('main_title', 'sub_title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'date' => 'required|date',
            'day' => 'required|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'session' => 'required|string',
        ]);

        Exam::create($validatedData);

        return redirect()->route('exams')->with('success', 'Exam added successfully.');
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $main_title = 'Exams';
        $sub_title = 'Edit Exam';

        return view('exams.edit', compact('exam', 'main_title', 'sub_title'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'date' => 'required|date',
            'day' => 'required|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'session' => 'required|string',
        ]);

        $exam->update($validatedData);

        return redirect()->route('exams')->with('success', 'Exam updated successfully.');
    }

    public function destroy($id)
    {
        Exam::destroy($id);

        return redirect()->route('exams')->with('success', 'Exam deleted successfully.');
    }
}
