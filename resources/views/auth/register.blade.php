
<!DOCTYPE html>
<html>
<head>
	<title>Login and Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>
	<div class="logo">
					<img src="{{ asset('assets/img/logo.png') }}" alt="logo">

				</div>
	<div class="signup-box">
		<h1>Sign Up</h1>
		<h2><img src="{{ asset('assets/img/logom.png') }}" alt="logom"></h2>
        <div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="nama" name="name">
            
            </div>
            <div class="textbox">
                <i class="far fa-envelope"></i>
                <input type="text" placeholder="E-mail" name="email">
            
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" name="password_confirmation">
            </div>

            <input class="btn" type="submit" name="" value="Sign up"> 
        </form>

	</div>

</body>
</html>