<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class StudentController extends Controller
{
    public function index()
    {
        // Allow access for admin or users with read-students permission
        if (auth()->user()->hasRole('admin') || auth()->user()->can('read-students')) {
            if (auth()->user()->hasRole('admin')) {
                $students = Student::all(); // Admin can view all students
            } else {
                $students = Student::where('user_id', auth()->id())->get(); // Regular users see their own students
            }

            $main_title = 'Students';
            $sub_title = 'Manage Students';

            return view('students.index', compact('students', 'main_title', 'sub_title'));
        }

        abort(403, 'This action is unauthorized.');
    }

    public function create()
    {
        $main_title = 'Students';
        $sub_title = 'Add Student';

        return view('students.add', compact('main_title', 'sub_title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students',
            'department' => 'required|string',
            'year' => 'required|integer',
            'batch' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:students', // Validate email
            'address' => 'required|string',
            'register_number' => 'required|string|unique:students',
        ]);

        // Debugging: Log the validated data
        \Log::info('Validated Data:', $validatedData);

        // Save the student record
        $student = Student::create($validatedData);

        // Debugging: Log the saved student
        \Log::info('Saved Student:', $student->toArray());

        return redirect()->route('students')->with('success', 'Student added successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id); // Fetch the student record
        $main_title = 'Students';
        $sub_title = 'Edit Student';

        return view('students.edit', compact('student', 'main_title', 'sub_title')); // Pass the correct variables
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id,' . $id,
            'department' => 'required|string',
            'year' => 'required|integer',
            'batch' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email|unique:students,email,' . $id, // Validate email
            'address' => 'required|string',
            'register_number' => 'required|string|unique:students,register_number,' . $id,
        ]);

        $student->update($validatedData);

        return redirect()->route('students')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('students')->with('success', 'Student deleted successfully.');
    }

    public function download($id)
    {
        $student = Student::findOrFail($id);

        // Ensure admin or owner can download
        if (auth()->user()->hasRole('admin') || $student->user_id == auth()->id()) {
            // Logic to download student data
            return response()->download(storage_path("app/public/students/{$student->file}"));
        }

        abort(403, 'Unauthorized action.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xlsx',
        ]);

        Excel::import(new StudentsImport, $request->file('import_file'));

        return redirect()->route('students.index')->with('success', 'Students imported successfully.');
    }

 
}
