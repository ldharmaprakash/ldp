@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <h3>{{ $main_title }}</h3>
    </div>
    <div class="app-content">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Teacher ID</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->teacher_id }}</td>
                                <td>{{ $teacher->department }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('teachers.delete', $teacher->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No teachers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
