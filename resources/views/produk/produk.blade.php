<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/product.css')}}">
  <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

	<title>Product Page</title>
</head>
<body>
	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo1">
	</div>

<div class="main">
		
	<div class="btn-group">
      @if(Auth::user()!==null)
						@if(Auth::user()->admin)
        		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/admin/user">admin</a></button>

						@endif
			@endif
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/">Home</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/produk">Produk</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/saran">Saran</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/profile"><i class="far fa-user"></i>Profile</a></button>
	</div>
  <form action="/produk" method="get">
	  <div class="search-box">
	  	<input class="search-txt" type="text" name="cari" placeholder="Search">
	  	<button  type="submit"  placeholder="" style=" background-color: Transparent;outline:none;"> <a class="search-btn" href="#"><i class="fas fa-search"></i></a> </button>
	  	
    </div>
  </form>

<div class="prod-header">

  <?php
          if($query != ''){
            $data = explode('=', $query);
            echo "cari: $data[1]";
          }
  ?>
  <?php
      if($consumable == 2){
        echo "<h2>Products: </h2>";
      }
      elseif($consumable == 1){
        echo "<h2>Consumable Products: </h2>";
      }
      else{
        echo "<h2>Not-Consumable Products: </h2>";

      }

  ?>
  
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
        <h4 style="color:#fff"> produk tidak ditemukan </h4>
    @endif
    
    </div>
  </ul>
	</div>
</div>

<section class="effect-1">
	<ul>
  <!-- {{ var_dump($query == 'cari=sds') }} -->
        <?php
          if($consumable == 2){
            if($query != ''){
              echo "<li class='rv-bg'><a href='/consumable?$query'><span data-hover='Consumable'>
              Consumable";
              echo "<li class='rv-bg'><a href='/not-consumable?$query'><span data-hover='Not&nbsp;Consumable'>
              Not Consumable";
            }
            else{
              echo '<li class="rv-bg"><a href="/consumable"><span data-hover="Consumable">
              Consumable';
              echo '<li class="rv-bg"><a href="/not-consumable"><span data-hover="Not&nbsp;Consumable">
              Not Consumable';
            }

          }
          elseif($consumable == 1){
            if($query != '')
      	  	  echo "<li class='rv-bg'><a href='/not-consumable?$query'><span data-hover='Not&nbsp;Consumable'>";
            else
              echo '<li class="rv-bg"><a href="/not-consumable"><span data-hover="Not&nbsp;Consumable">';
            echo 'Not Consumable';
          }
          else{
            if($query != '')
              echo "<li class='rv-bg'><a href='/consumable?$query'><span data-hover='Consumable'>";
            else
              echo '<li class="rv-bg"><a href="/consumable"><span data-hover="Consumable">';
            echo 'Consumable';

          }
        ?>
        
        
      </span></a></li>
	</ul>
</section>


</div>

</body>
</html>

