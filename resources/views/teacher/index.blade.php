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
                    @if(auth()->user()->hasRole('admin') || auth()->user()->can('create-teacher'))
                        <a href="{{ route('teacher.create') }}" class="btn btn-primary float-end">
                            <i class="bi bi-plus-circle"></i> Add Teacher
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Teacher ID</th>
                                        <th>Department</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->teacher_id }}</td>
                                            <td>{{ $teacher->department }}</td>
                                            <td>{{ $teacher->gender }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>
                                                @if(auth()->user()->hasRole('admin') || auth()->user()->can('update-teacher'))
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                @endif
                                                @if(auth()->user()->hasRole('admin') || auth()->user()->can('delete-teacher'))
                                                    <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST" style="display:inline;">
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
