<!DOCTYPE html>
<html>
<head>
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/product.css')}}">


	<title>Product Page</title>
</head>
<body>
	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo1">
	</div>

<div class="main">
		
	<div class="btn-group">
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/">Beranda</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/saran">Saran</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/profile"><i class="far fa-user"></i>Profile</a></button>
	</div>

</div>

<div class="prod-header">
      <h2>{{ $penyakit->nama }} :</h2>    		 

</div>



<div class="prod-box">
	<div class="prod-img">
  <ul class="box-grid">
  	<div class="box-img">
    <h4 style="color: white">Sebaiknya tidak memakan:</h4>
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

</body>
</html>

