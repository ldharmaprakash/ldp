@extends('layouts.app')
@section('content')
<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"> Exams </h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}"> Dashboard </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Exams
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
								<h3 class="card-title"> Exams List </h3>
								<a href="{{ route('exams.create') }}" class="btn btn-primary btn-round ms-auto">
									Add Exam
								</a>
							</div>
						</div>
						<div class="card-body transition-none">
							{!! $dataTable->table(['id' => 'examsTable', 'class' => 'table table-bordered table-striped'], true) !!}
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
        $('#examsTable').DataTable(); // Ensure DataTable initialization
    });
</script>
@endpush