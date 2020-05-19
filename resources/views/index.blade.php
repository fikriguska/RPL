<!DOCTYPE html>
<html>
<head>
	<title>Minefood.</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
	<script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>
		<header>
			<div class="main">
				<div class="logo">
					<img src="{{asset('assets/img/logo.png')}}" alt="logo">
				</div>
				<ul>
					@if(Auth::user()!==null)
						@if(Auth::user()->admin)
						<li><a href="/admin/user">Admin</a></li>
						@endif
					@endif

					<li class="active"><a href="/">Beranda</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Masuk</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register')}}">Daftar</a></li>
                    @endif
                    @else
                    <li><a href="/produk">Produk</a></li>
                    <li><a href="/penyakit">Penyakit</a></li>
                    <li><a href="/saran">Saran</a></li>
                    <li><a href="/profile">Profil</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest

				</ul>

			</div>


			<div class="title">
				<img src="{{asset('assets/img/logom.png')}}" alt="logom">
				<h1>Minefood.</h1>
				<p>	minefood. membantu kalian semua untuk menemukan komposisi terbaik untuk kalian konsumsi dengan mempertimbangkan penyakit yang kalian punya untuk memberikan solusi terbaik untuk kesehatan kalian.</p>
			</div>

		</header>


</body>
</html>