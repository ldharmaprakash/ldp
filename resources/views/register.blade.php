<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> Register </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="login-page transition-none">
        <div id="app" class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ route('dashboard') }}" class="h1"> <b> Register </b> </a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register a new account</p>
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                            <label for="name" class="form-label"> Name </label>
                            <span class="text-danger"> {{ $errors->first('name') }} </span>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            <label for="email" class="form-label"> Email </label>
                            <span class="text-danger"> {{ $errors->first('email') }} </span>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <label for="password" class="form-label"> Password </label>
                            <span class="text-danger"> {{ $errors->first('password') }} </span>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            <label for="password_confirmation" class="form-label"> Confirm Password </label>
                        </div>
                        <div class="form-floating mb-2">
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                @foreach($roles as $id => $name)
                                    <option value="{{ $id }}" {{ old('role') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="role" class="form-label"> Role </label>
                            <span class="text-danger"> {{ $errors->first('role') }} </span>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary rounded">Register</button>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('login') }}"  class="mb-4 " style="  text-align: center; text-decoration: underline;">sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/register.js') }}"></script>
    </body>
</html>
