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
            <li><a href="/">Home</a></li>
            @guest
            <li><a href="">Log in</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register')}}">Sign Up</a></li>
            @endif
            @else
            <li class="active"><a href="/saran">Saran</a></li>
            <li><a href="/profile">profile</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a></li>
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
        {{ Form::submit('submit', ['class'=>'btn btn-primary', 'onclick' => 'alert("Saran Terkirim")'])}}
    {!! Form::close() !!}

	</div>
    <header>


</body>
