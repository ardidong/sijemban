@extends('layoutsumum')
@section('content')
	<div class="container">
		<div class="row mt-5">
			<div class='col-md-6 offset-md-3'>
				<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin-top:50px; margin-bottom:100px;">
					<div class='card-body'>
						<div class='col-md-6 offset-md-3'>
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
@endsection
