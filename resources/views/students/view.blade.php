@extends('layouts.app')
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0"> Students </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Students
                            </li>
                        </ol>
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
                                <div class="d-flex align-items-center">
                                    <h3 class="card-title"> Students List </h3>
                                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-round ms-auto">
                                        Add Student
                                    </a>
                                </div>
                            </div>
                            <div class="card-body transition-none">
                                {!! $dataTable->table(['id' => 'studentsTable', 'class' => 'table table-bordered table-striped'], true) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable(); // Ensure DataTable initialization
        });

        $(document).ready(function() {
            $('.toggle-button').on('click', function() {
                $('.toggle-list').toggle();
            });
            $('#studentsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 5,
                language: {
                    search: "Filter records:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });
    </script>
@endpush
