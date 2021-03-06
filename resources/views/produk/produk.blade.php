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
        		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/admin/user">Admin</a></button>

						@endif
			@endif
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/">Beranda</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/produk">Produk</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/penyakit">Penyakit</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/saran">Saran</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/profile"><i class="far fa-user"></i>Profil</a></button>
	</div>
  <form action="/produk" method="get">
	  <div class="search-box">
	  	<input class="search-txt" type="text" name="cari" placeholder="Cari Produk...">
	  	<button  type="submit"  placeholder="" style=" background-color: Transparent;outline:none;"> <a class="search-btn" href="#"><i class="fas fa-search"></i></a> </button>
    </div>
  </form>

<div class="prod-header">

  <?php
          if($query != ''){
            $data = explode('=', $query);
            echo "Hasil cari: $data[1]";
          }
  ?>
  <?php
      if($consumable == 2){
        echo "<h2>Produk: </h2>";
      }
      elseif($consumable == 1){
        echo "<h2>Boleh dikonsumsi: </h2>";
      }
      else{
        echo "<h2>Sebaiknya tidak dikonsumsi: </h2>";

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
        
        <li>
          <a href="/produk/{{$p->id}}">
            <img src="/gambar/{{$p->gambar}}" width="200px" height="200px" style="object-fit: cover;" align="middle"/>
          </a>
        </li>
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
              echo "<li class='rv-bg'><a href='/consumable?$query'><span data-hover='aman&nbsp;dikonsumsi'>
              aman dikonsumsi";
              echo "<li class='rv-bg'><a href='/not-consumable?$query'><span data-hover='tidak&nbsp;aman&nbsp;dikonsumsi'>
              tidak aman dikonsumsi";
            }
            else{
              echo '<li class="rv-bg"><a href="/consumable"><span data-hover="aman&nbsp;dikonsumsi">
              aman dikonsumsi';
              echo '<li class="rv-bg"><a href="/not-consumable"><span data-hover="tidak&nbsp;aman&nbsp;dikonsumsi">
              tidak aman dikonsumsi';
            }

          }
          elseif($consumable == 1){
            if($query != '')
      	  	  echo "<li class='rv-bg'><a href='/not-consumable?$query'><span data-hover='tidak&nbsp;aman&nbsp;dikonsumsi'>";
            else
              echo '<li class="rv-bg"><a href="/not-consumable"><span data-hover="tidak&nbsp;aman&nbsp;dikonsumsi">';
            echo 'tidak aman dikonsumsi';
          }
          else{
            if($query != '')
              echo "<li class='rv-bg'><a href='/consumable?$query'><span data-hover='aman&nbsp;dikonsumsi'>";
            else
              echo '<li class="rv-bg"><a href="/consumable"><span data-hover="aman&nbsp;dikonsumsi">';
            echo 'aman dikonsumsi ';

          }
        ?>
        
        
      </span></a></li>
	</ul>
</section>


</div>

</body>
</html>

