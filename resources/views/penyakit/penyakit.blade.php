<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/penyakit.css')}}">
  
  <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

	<title>Penyakit</title>
</head>
<body>
	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo1">
	</div>

<div class="main">
		
	<div class="btn-group">
      @if(Auth::user()!==null)
						@if(Auth::user()->admin)
        		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/admin/user">Admin</a></button>

						@endif
			@endif
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/">Beranda</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/produk">Produk</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/saran">Saran</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/profile"><i class="far fa-user"></i>Profil</a></button>
	</div>


<div class="penyakit-header">
	<h2>List penyakit :</h2>
</div>

<div class="list-penyakit">
	<div class="list">
	<ul>
  @if(count($penyakit) > 0)
  @foreach($penyakit as $p)
    <a href="/penyakit/{{$p->id}}" style='text-decoration:none'><li><span class="name"> {{$p->nama}} </span>  </li></a>
  @endforeach
  @else
    <li><span class="name"> penyakit tidak ditemukan </span>  </li>
  @endif


	</ul>
	</div>
</div>	


<div class="prod-header">
<!--  -->
<form action="/penyakit" method="get">
	  <div class="search-box">
	  	<input class="search-txt" type="text" name="cari" placeholder="Cari Penyakit...">
	  	<button  type="submit"  placeholder="" style=" background-color: Transparent;outline:none;"> <a class="search-btn" href="#"><i class="fas fa-search"></i></a> </button>
    </div>
  </form>  
</div>



<div class="prod-box">
	<div class="prod-img">
  <ul class="box-grid">
  	<div class="box-img">
    <!-- <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li>
    <li><a href="#"><img src="http://placehold.it/150x150" /></a></li> -->
 


    
    </div>
  </ul>
	</div>
</div>

<section class="effect-1">
	<ul>
    
	</ul>
</section>


</div>

</body>
</html>

