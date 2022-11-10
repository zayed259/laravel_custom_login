<!doctype html>
<html lang="en">

<head>
	<title>{{ config('app.name', 'Laravel') }} | Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{url('assets/img/icons/icon-48x48.png')}}" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/logregstyle.css')}}">
</head>

<body>

    <h1>Dashboard</h1>
    Welcome {{ Auth::user()->name }}
    {{-- logout button --}}
    <form action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit">Logout</button>
    </form>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Reset Password</h3>
								</div>
							</div>
                            @include('partial.error')
							@include('partial.flash')

							<form method="POST" action="{{ route('reset-password') }}" class="signin-form">
                                @csrf
								<div class="form-group">
									<input id="current_password" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Current Password</label>
									<span toggle="#current_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">New Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
									<label class="form-control-placeholder" for="cpassword">Confirm Password</label>
									<span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{url('assets/js/logreg.js')}}"></script>

</body>

</html>