

<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>
	<div class="logo">
					<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
				</div>
				
	<div class="login-box">
		<h1>Masuk</h1>
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
            <input type="text" placeholder="Email" name="email">
        
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Kata Sandi" name="password">
        </div>

        <input class="btn" type="submit" name="" value="Masuk">
        <a href="/register"> <input class="btn1" type="button" name="" value="Daftar akun">  </a>

        </div>
    </form>

</body>
</html>
