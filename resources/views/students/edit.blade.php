@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <h3>{{ $main_title }}</h3>
        </div>
        <div class="app-content">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $student->name) }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="student_id" class="form-label">Student ID</label>
                                    <input type="text" name="student_id" class="form-control"
                                        value="{{ old('student_id', $student->student_id) }}" required>
                                    @error('student_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control"
                                        value="{{ old('department', $student->department) }}" required>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control"
                                        value="{{ old('year', $student->year) }}" required>
                                    @error('year')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="batch" class="form-label">Batch</label>
                                    <input type="text" name="batch" class="form-control"
                                        value="{{ old('batch', $student->batch) }}" required>
                                    @error('batch')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male"
                                            {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female"
                                            {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ old('dob', $student->dob) }}" required>
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control"
                                        value="{{ old('mobile', $student->mobile) }}" required>
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" required>{{ old('address', $student->address) }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="register_number" class="form-label">Register Number</label>
                                    <input type="text" name="register_number" class="form-control"
                                        value="{{ old('register_number', $student->register_number) }}" required>
                                    @error('register_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $student->email) }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="justify-content-end d-flex">
                                <a class="btn btn-primary mt-3 me-2" href="{{ route('students') }}">Back</a>
                                <button type="submit" class="btn btn-primary mt-3 me-2">Update Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
