<div class="card">
	<div class="card-header">
		<div class="card-title"> {{ $sub_title }} </div>
	</div>
	<div class="card-body">
		<div class="form-group mb-3">
			<label for="name"> Name <em class="text-danger">* </em> </label>
			<input type="text" name="name" value="{{ old('name',$result->name) }}" class="form-control" id="name" placeholder="Name">
			<span class="text-danger">{{ $errors->first('name') }}</span>
		</div>
		<div class="form-group mb-3">
			<label for="description"> Description <em class="text-danger">* </em> </label>
			<input type="text" name="description" value="{{ old('description',$result->description) }}" class="form-control" id="description" placeholder="Description">
			<span class="text-danger">{{ $errors->first('description') }}</span>
		</div>
		@if(count($permissions))
		<div class="form-group">
			<label for="permission"> Permissions <em class="text-danger"> * </em> </label>
			<div class="g-3 mt-1 row">
				@foreach($permissions as $permission)
				<div class="col-3">
					<div class="form-check">
						<input type="checkbox" name="permission[]" class="form-check-input" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" :checked="{{ in_array($permission->id,$old_permissions) ? 'true':'false' }}">
						<label for="permission_{{ $permission->id }}" class="form-check-label"> {{ $permission->display_name }} </label>
					</div>
				</div>
				@endforeach
			</div>
			<span class="text-danger"> {{ $errors->first('permission') }} </span>
		</div>
		@endif
	</div>
	<div class="card-footer">
		<a href="{{ route('roles')}}" class="btn btn-danger"> Back </a>
		<button type="submit" class="btn btn-primary float-end"> Submit </button>
	</div>
</div>