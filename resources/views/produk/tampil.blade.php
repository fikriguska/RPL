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
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/">Home</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/saran">Saran</a></button>
		<button type="button" class="btn btn-default"><a style="text-decoration: none; color: #BE4868;" href="/profile"><i class="far fa-user"></i>Profile</a></button>
	</div>
  <form action="/produk" method="get">
	  <div class="search-box">
	  	<input class="search-txt" type="text" name="cari" placeholder="Search">
	  	<button  type="submit"  placeholder="" style=" background-color: Transparent;outline:none;"> <a class="search-btn" href="#"><i class="fas fa-search"></i></a> </button>
	  	
    </div>
  </form>

</div>

<div class="prod-header">
      <h2>{{ $produk->nama }} :</h2>    		 
</div>


<div class="prod-box">
	<div class="prod-img">
  <ul class="box-grid">
  	<div class="box-img">
	  <?php
	  		if($laranganKP == []){
				echo 'makanan ini boleh dimakan :)';
			}
			else{
	  			echo 'Disarankan tidak dimakan karena mengandung ';
				foreach($laranganKP2 as $kp){
					echo $kp->nama.", ";
				}
			}
		?>
    </div>
  </ul>
	</div>
</div>

</body>
</html>

