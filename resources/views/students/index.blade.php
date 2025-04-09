@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">{{ $main_title }}</h3>
                    </div>
                    <div class="col-sm-6">
                        @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-teachers'))
                            <a href="{{ route('students.create') }}" class="btn btn-primary float-end">
                                <i class="bi bi-plus-circle"></i> Add Student
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $sub_title }}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="studentTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Student ID</th>
                                            <th>Department</th>
                                            <th>Year</th>
                                            <th>Batch</th>
                                            <th>Email</th> <!-- Add email column -->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->student_id }}</td>
                                                <td>{{ $student->department }}</td>
                                                <td>{{ $student->year }}</td>
                                                <td>{{ $student->batch }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>
                                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('update-students'))
                                                        <a href="{{ route('students.edit', $student->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                    @endif
                                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete-students'))
                                                        <form action="{{ route('students.delete', $student->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
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
