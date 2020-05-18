
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>
	<div class="logo">
					<img src="{{ asset('assets/img/logo.png') }}" alt="logo">

				</div>
	<div class="signup-box">
		<h1>Daftar</h1>
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
                <input type="text" placeholder="Nama" name="name">
            
            </div>
            <div class="textbox">
                <i class="far fa-envelope"></i>
                <input type="text" placeholder="Email" name="email">
            
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Kata Sandi" name="password" required autocomplete="new-password">
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Konfirmasi Kata Sandi" name="password_confirmation">
            </div>

            <input class="btn" type="submit" name="" value="Daftar"> 
        </form>

	</div>

</body>
</html>