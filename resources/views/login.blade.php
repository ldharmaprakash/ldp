<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="{{ $keywords ?? '' }}">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#008276">
        <title> Admin Dashboard </title>
        <meta name="robots" content="index,follow">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.1.0/styles/overlayscrollbars.min.css" integrity="sha256-LWLZPJ7X1jJLI5OG5695qDemW1qQ7lNdbTfQ64ylbUY=" crossorigin="anonymous">
        <!-- Include App Style Sheet -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body class="login-page transition-none">
		<div id="app" class="login-box">
			<div class="card card-outline card-primary">
				<div class="card-header text-center">
					<a href="{{ route('dashboard') }}" class="h1"> <b> Admin Panel </b> </a>
				</div>
				<div class="card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form action="{{ route('authenticate') }}" method="POST">
						@csrf
						<div class="form-floating mb-2">
							<input type="email" name="email" value="{{ old('email','admin@gmail.com') }}" class="form-control" placeholder="Email">
							<label for="email" class="form-label"> Email </label>
							<span class="text-danger"> {{ $errors->first('email') }} </span>
						</div>
						<div class="password-with-toggler input-group floating-input-group flex-nowrap">
							<div class="form-floating flex-grow-1">
								<input type="password" name="password" class="password form-control" placeholder="Password">
								<label class="form-label"> Password </label>
							</div>
							<span class="input-group-text"><i class="fas fa-eye cursor-pointer toggle-password active" area-hidden="true"></i></span>
						</div>
						<span class="text-danger"> {{ $errors->first('password') }} </span>
						<div class="row mt-3">
	                        <div class="col-8">
	                            <div class="form-check">
	                                <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="rememberMe" checked>
	                                <label class="form-check-label" for="rememberMe">
	                                    Remember Me
	                                </label>
	                            </div>
	                        </div>
	                        <div class="col-4">
	                            <div class="d-grid gap-2">
	                                <button type="submit" class="btn btn-primary rounded">Sign In</button>
	                            </div>
	                        </div>
	                    </div>
                	</form>
				</div>
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/functions.js') }}"></script>
		<!-- Jquery Backstretch -->
		<script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js') }}"></script>
		@if(Session::has('message'))
		<script type="text/javascript">
		$(document).ready(function() {
			let state = "{!! session('state') !!}";
			let content = {
				title: "{!! session('title') !!}",
				message: "{!! session('message') !!}",
			};
			flashMessage(content,state);
		});
		</script>
		@endif
		<script type="text/javascript">
			togglePasswordField = function(event) {
		        let parentElement = event.target.closest(".password-with-toggler");

		        let passwordElem = parentElement.querySelector('.password');
		        let type = passwordElem.getAttribute('type') === 'password' ? 'text' : 'password';
		        passwordElem.setAttribute('type', type);
		        this.classList.toggle('icon-eye-slash');
		    };
		    
		    document.querySelectorAll('.toggle-password').forEach(item => {
		        item.addEventListener(event, togglePasswordField);
		    });
			
			$(document).ready(function() {
				var sliders = {!! $sliders !!};
				var slider_options = {duration: 3000, fade: 1000};
				// $.backstretch(sliders, slider_options);
			});
		</script>
	</body>
</html>