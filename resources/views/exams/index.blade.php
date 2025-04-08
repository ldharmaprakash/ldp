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
                        @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-exams'))
                            <a href="{{ route('exams.create') }}" class="btn btn-primary float-end">
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Session</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $index => $exam)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $exam->exam_name }}</td>
                                                <td>{{ $exam->date }}</td>
                                                <td>{{ $exam->day }}</td>
                                                <td>{{ $exam->department }}</td>
                                                <td>{{ $exam->subject }}</td>
                                                <td>{{ $exam->session }}</td>
                                                <td>
                                                    <a href="{{ route('exams.edit', $exam->id) }}"
                                                        class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('exams.delete', $exam->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i></button>
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
    </main>
@endsection
