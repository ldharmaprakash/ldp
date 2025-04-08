@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>{{ $main_title }}</h3>
    </div>
    <div class="app-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('exams.update', $exam->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div  class="row g-3">
                        <div class="col-md-6">
                           <div class="mb-3">
                             <label for="exam_name" class="form-label">Exam Name</label>
                             <input type="text" name="exam_name" class="form-control" value="{{ $exam->exam_name }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="date" class="form-label">Date</label>
                               <input type="date" name="date" class="form-control" value="{{ $exam->date }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="day" class="form-label">Day</label>
                               <input type="text" name="day" class="form-control" value="{{ $exam->day }}" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                               <label for="department" class="form-label">Department</label>
                               <input type="text" name="department" class="form-control" value="{{ $exam->department }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="subject" class="form-label">Subject</label>
                               <input type="text" name="subject" class="form-control" value="{{ $exam->subject }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="session" class="form-label">Session</label>
                               <input type="text" name="session" class="form-control" value="{{ $exam->session }}" required>
                           </div>
                        </div>
                        
                    </div>
                    <div class="justify-content-end d-flex">
                        <a href="{{ route('exams') }}" class="btn btn-primary mt-3 me-2">Back</a>
                       <button type="submit" class="btn btn-primary mt-3 me-2">Update Exam</button>
                    </div>
                          
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
