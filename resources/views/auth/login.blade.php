<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" type="image/png" href="/storage/gambar/favicon-16x16.png"/>
    <title>{{ config('app.name', 'JEMBATAN') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
 	<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

</head>
<body style='background: #EB413D;'>	
	<div class="container">
		<div class="row mt-5">
			<div class='col-md-6 offset-md-3'>
				<div class="card">
					<div class='card-body'>
						<div class='col-md-6 offset-md-3'> 
							<img class='mx-auto d-block' src="/storage/gambar/logo.png" alt="logo" width="72" height="72">
							<form class="form-signin" method="POST" action="{{ route('login') }}">
								@csrf

									<h1 class='text-center'> Sign in</h1>
									<div class="form-group row">
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder='Email address' name="email" value="{{ old('email') }}" required autofocus>
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
												</span>	
											@endif
									</div>

									<div class="form-group row">
										<input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" placeholder="Password" required>	
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>			

									<div class="form-group row">
										<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember{{ old('remember') ? 'checked' : '' }}">
												<label class="form-check-label" for="remember">
														{{ __('Remember Me') }}
												</label>
										</div>
									</div>

								<div class="form-group">
									<button type="submit" class="btn btn-lg btn-primary btn-block">
											{{ __('Login') }}
									</button>

									@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
													{{ __('Forgot Your Password?') }}
											</a>
									@endif
								</div>
								<p class="text-center text-muted">&copy; 2017-2018</p>
								</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		//$('.js-tilt').tilt({
		//	scale: 1.1
		//})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>