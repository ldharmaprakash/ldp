@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>{{ $main_title }}</h3>
    </div>
    <div class="app-content">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('exams.create') }}" class="btn btn-primary mb-3">Add Exam</a>
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
                        @foreach($exams as $index => $exam)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $exam->exam_name }}</td>
                                <td>{{ $exam->date }}</td>
                                <td>{{ $exam->day }}</td>
                                <td>{{ $exam->department }}</td>
                                <td>{{ $exam->subject }}</td>
                                <td>{{ $exam->session }}</td>
                                <td>
                                    <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('exams.delete', $exam->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
