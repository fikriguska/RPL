

<!DOCTYPE html>
<html>
<head>
	<title>Login and Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
	<script src="https://kit.fontawesome.com/4814c1385c.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="logo">
					<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
				</div>
				
	<div class="login-box">
		<h1>Log in</h1>
		<h2><img src="{{ asset('assets/img/logom.png') }}" alt="logom"></h2>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <form action="{{ route('login') }}" method="POST">
    @csrf
        <div class="textbox">
            <i class="far fa-user"></i>
            <input type="text" placeholder="email" name="email">
        
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password">
        </div>

        <input class="btn" type="submit" name="" value="Log in">
        <a href="/register"> <input class="btn1" type="button" name="" value="Sign up?">  </a>

        </div>
    </form>

</body>
</html>
