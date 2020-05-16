<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/product.css')}}">
	<script src="https://kit.fontawesome.com/4814c1385c.js" crossorigin="anonymous"></script>
	<title>Product Page</title>
</head>
<body>
	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo1">
	</div>

<div class="main">
		
	<div class="btn-group">
		<button type="button" class="btn btn-default">Home</button>
		<button type="button" class="btn btn-default">Saran</button>
		<button type="button" class="btn btn-default"><i class="far fa-user"></i>Profile</button>
	</div>

	<div class="search-box">
		<input class="search-txt" type="text" name="" placeholder="Search">
		<a class="search-btn" href="#"><i class="fas fa-search"></i></a>
	</div>

<div class="prod-header">
  @if($consumable)
      <h2>Consumable Product :</h2>    		 
  @else
      <h2>Not Consumable Product :</h2>    		 
  @endif
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
    @if(count($produk) > 0)
    @foreach($produk as $p)
        
        <li><a href="/produk/{{$p->id}}"><img src="http://placehold.it/150x150" /></a></li>
    @endforeach
    @else
        <!-- <h2> Di dalam daftar ini tidak boleh ada yang kamu makan :) cepet sembuh :v ! </h2> -->
    @endif
    
    </div>
  </ul>
	</div>
</div>

<section class="effect-1">
	<ul>
        @if($consumable)
    		 <li class="rv-bg"><a href="/not-consumable" ><span data-hover="Not&nbsp;Consumable">
          Not Consumable
        @else
    		 <li class="rv-bg"><a href="/consumable"><span data-hover="Consumable">

          Consumable
        @endif
      </span></a></li>
	</ul>
</section>


</div>

</body>
</html>

