<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
	<script src="https://kit.fontawesome.com/4814c1385c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
    <header>
			<div class="main">
				<div class="logo">
					<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
				</div>
				<ul>
					<li class="active"><a href="/">Home</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register')}}">Sign Up</a></li>
                    @endif
                    @else
                    <li><a href="/saran">Saran</a></li>
                    <li><a href="/profile">profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                    
				</ul>
				<div class="search-box">
					<input class="search-txt" type="text" name="" pllaceholder="Kamu mau cari apa ?">
					<a class="search-btn" href="#">
						<i class="fas fa-search"></i>
						
					</a>
				</div>

			</div>
			<div class="title">
                <main class="py-4">
                @yield('content')
                </main>
			</div>

		</header>
    </div>
</body>
</html>
