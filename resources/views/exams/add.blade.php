@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>{{ $main_title }}</h3>
    </div>
    <div class="app-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exam_name" class="form-label">Exam Name</label>
                                <input type="text" name="exam_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <input type="text" name="day" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="session" class="form-label">Session</label>
                                <input type="text" name="session" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end d-flex">
                       <a  class="btn btn-primary mt-3 me-2" href="{{ route('exams') }}" style="color:white;">Back</a>
                       <button type="submit" class="btn btn-primary mt-3 ">Add Exam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
