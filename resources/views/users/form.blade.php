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
			<label for="email"> Email <em class="text-danger">* </em> </label>
			<input type="text" name="email" value="{{ old('email',$result->email) }}" class="form-control" id="email" placeholder="Email">
			<span class="text-danger">{{ $errors->first('email') }}</span>
		</div>
		<div class="form-group mb-3">
			<label for="password"> Password <em class="text-danger">* </em> </label>
			<input type="text" name="password" value="{{ old('password','') }}" class="form-control" id="password" placeholder="Password">
			<span class="text-danger">{{ $errors->first('password') }}</span>
		</div>
		<div class="form-group mb-3">
			<label for="role"> Role <em class="text-danger">* </em> </label>
			<select name="role" class="form-select">
				<option> Select </option>
				@foreach($roles as $key => $value)
					<option value="{{ $key }}" :selected="{{ $key == old('role',$role_id ?? '') ? 'true' : 'false' }}"> {{ $value }} </option>
				@endforeach
			</select>
			<span class="text-danger">{{ $errors->first('role') }}</span>
		</div>
	</div>
	<div class="card-footer">
		<a href="{{ route('users')}}" class="btn btn-danger"> Back </a>
		<button type="submit" class="btn btn-primary float-end"> Submit </button>
	</div>
</div>