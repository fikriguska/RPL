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

					<li class="active"><a href="/">Home</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register')}}">Sign Up</a></li>
                    @endif
                    @else
                    <li><a href="/produk">Produk</a></li>
                    <li><a href="/saran">Saran</a></li>
                    <li><a href="/profile">profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest

				</ul>

				<form action="/produk" method="get">
					  <div class="search-box">
					  	<input class="search-txt" type="text" name="cari" placeholder="Search">
					  	<button  type="submit"  placeholder="" style=" background-color: Transparent;outline:none;"> <a class="search-btn" href="#"><i class="fas fa-search"></i></a> </button>
  				  </div>
  				</form>

			</div>


			<div class="title">
				<img src="{{asset('assets/img/logom.png')}}" alt="logom">
				<h1>Minefood.</h1>
				<p>	minefood. membantu kalian semua untuk menemukan komposisi terbaik untuk kalian konsumsi dengan mempertimbangkan penyakit yang kalian punya untuk memberikan solusi terbaik untuk kesehatan kalian.</p>
			</div>

		</header>


</body>
</html>