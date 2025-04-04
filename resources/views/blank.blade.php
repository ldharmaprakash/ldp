@extends('layouts.app')
@section('content')
<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"> {{ $main_title }} </h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}"> Dashboard </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							{{ $sub_title }}
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
								<h3 class="card-title"> {{ $sub_title }} </h3>
							</div>
						</div>
						<div class="card-body">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection