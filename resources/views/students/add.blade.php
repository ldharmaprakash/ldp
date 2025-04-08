@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <h3>{{ $main_title }}</h3>
        </div>
        <div class="app-content">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
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
                                    <label for="student_id" class="form-label">Student ID</label>
                                    <input type="text" name="student_id" class="form-control"
                                        value="{{ old('student_id') }}" required>
                                    @error('student_id')
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" value="{{ old('year') }}"
                                        required>
                                    @error('year')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="batch" class="form-label">Batch</label>
                                    <input type="text" name="batch" class="form-control" value="{{ old('batch') }}"
                                        required>
                                    @error('batch')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
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
                                    <label for="register_number" class="form-label">Register Number</label>
                                    <input type="text" name="register_number" class="form-control"
                                        value="{{ old('register_number') }}" required>
                                    @error('register_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="justify-content-end d-flex mt-5">
                                    <a href="{{ route('students') }}" class="btn btn-primary me-2 mt-3">Back</a>
                                    <button type="submit" class="btn btn-primary  me-2 mt-3">Add Student</button>
                                </div>
                            </div>
                    </form>
                    <hr class="mx-auto my-4"
                        style="width: 90%; height: 2px; border: none; background: #ccc; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);">
                    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
                            <div style="max-width: 300px;">
                                <label for="import_file" class="form-label text-center">Import Students
                                    (Excel/CSV)</label>
                                <input type="file" name="import_file" class="form-control" id="import_file"
                                    accept=".csv, .xlsx" required>
                                @error('import_file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4"style="max-width: 300px;">
                                <button type="submit" class="btn btn-secondary w-100">Import Students</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
