<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login JEMBATAN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="signin.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<style>
		.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
	padding: 15px;
  background: #EB413D;
  background: -webkit-linear-gradient(-135deg, #eb413d, #ad2128);
  background: -o-linear-gradient(-135deg, #eb413d, #ad2128);
  background: -moz-linear-gradient(-135deg, #eb413d, #ad2128);
  background: linear-gradient(-135deg, #eb413d, #ad2128);
}

.wrap-login100 {
  width: 480px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 90px 90px 90px 90px;
}
	</style>
</head>
<body class="text-center">	
	<div class="limiter">
		<div class="container-login100">
				<div class="wrap-login100 ">
					<form class="form-signin" method="POST" action="{{ route('login') }}">

						@csrf
							<img class='mb-4'	src="{{ asset('storage/logo.png')	}}" alt="" width="72" height="72">

							<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
							<div class="form-group row">
									<div class="col-mb-6">
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder='Email address' name="email" value="{{ old('email') }}" required autofocus>

											@if ($errors->has('email'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('email') }}</strong>
													</span>	
											@endif
									</div>
							</div>

							<div class="form-group row">
								<div class="col-mb6-6">
										<input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" placeholder="Password" required>	
										@if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
										@endif
								</div>
						</div>			

						<div class="form-group row">
								<div class="col-md-6 offset-md-4">
										<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
														{{ __('Remember Me') }}
												</label>
										</div>
								</div>
						</div>

						<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn btn-lg btn-primary btn-block">
												{{ __('Login') }}
										</button>

										@if (Route::has('password.request'))
												<a class="btn btn-link" href="{{ route('password.request') }}">
														{{ __('Forgot Your Password?') }}
												</a>
										@endif
								</div>
						</div>
						<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
					  </form>
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
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>