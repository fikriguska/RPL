<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/saran.css') }}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

	
	<title>Saran</title>
</head>

<body>
<header>
	<div class="main">
	    <div class="logo">
	    	<img src="{{ asset('assets/img/logo.png')}}" alt="logo">
	    </div>

	    <div class="main-btn">
	    	<ul>
            @if(Auth::user()!==null)
						@if(Auth::user()->admin)
						<li><a href="/admin/user">Admin</a></li>
						@endif
			@endif

            <li><a href="/">Beranda</a></li>
            @guest
            <li><a href="">Masuk</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register')}}">Daftar</a></li>
            @endif
            @else
            <li><a href="/produk">Produk</a></li>
            <li class="active"><a href="/saran">Saran</a></li>
            <li><a href="/profile">Profil</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest

	    	</ul>

	</div>
    </div>

	
	<h2>Saran</h2>


	<div class="heading">
		

    {!! Form::open(['route' => 'create_saran', 'method' => 'POST']) !!}
        <div class="input-box">
            {{ Form::textarea('pesan', '', ['placeholder'=> "saran kamu...", 'style'=>'width:500px; height:200px;'])}}
        </div>
        {{ Form::submit('Kirim', ['class'=>'btn btn-primary', 'onclick' => 'alert("Saran Terkirim")'])}}
    {!! Form::close() !!}

	</div>
    <header>


</body>
