@extends('layouts.app')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Students</h3>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('students.create') }}" class="btn btn-primary float-end">Add Student</a>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Student Name</th>
                                        <th>Student ID</th>
                                        <th>Department</th>
                                        <th>Year</th>
                                        <th>Batch</th>
                                        <th>Gender</th>
                                        <th>DOB</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Register Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->department }}</td>
                                            <td>{{ $student->year }}</td>
                                            <td>{{ $student->batch }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->mobile }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->register_number }}</td>
                                            <td>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('students.delete', $student->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
