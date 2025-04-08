@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <h3>{{ $main_title }}</h3>
        </div>
        <div class="app-content">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_id" class="form-label">Teacher ID</label>
                                    <input type="text" name="teacher_id" class="form-control"
                                        value="{{ old('teacher_id') }}" required>
                                    @error('teacher_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control"
                                        value="{{ old('department') }}" required>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}"
                                        required>
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"
                                        required>
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Third Row -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control"
                                        value="{{ old('qualification') }}" required>
                                    @error('qualification')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary mt-3 me-2" href="{{ route('teachers') }}"
                                style="color:white;">Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Add Teacher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
