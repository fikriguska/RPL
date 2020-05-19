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

</div>

<div class="prod-header">
      <h2>{{ $produk->nama }} :</h2>    		 
</div>


<div class="prod-box">
	<div class="prod-img">
  <ul class="box-grid">
  	<div class="box-img">
	  <div>
	  	<img src="/gambar/{{$produk->gambar}}" alt="" style="border-radius: 20px 20px; width: 200px">
	  </div>
	  <?php
	  		if($laranganKP == []){
				echo '<div style="margin-top: 20px"> <span style="background-color: #77ff33;"> aman dikonsumsi oleh anda. </span> </div>';
			}
			else{
	
				echo '<div style="margin-top: 20px"> <span style="background-color: red; color: white; "> Disarankan tidak dimakan oleh anda karena mengandung';
				for($i = 0; $i < count($laranganKP2); $i++){
					echo " ".$laranganKP2[$i]->nama;
					if(count($laranganKP2) > 1 && $i == count($laranganKP2)-2){
						echo " dan";
					}
					else if($i != count($laranganKP2)-1){
						echo ",";
					}
				}
				echo ".</div>";
			}
			echo "<div style='color: white;'>";
			echo "<h2> Komposisi: </h2>";
			echo "<ul style='padding: 0; margin: 0'>";
			foreach($komposisi as $k){
				echo "<li> - $k->nama </li>";
			}
			echo "</ul>";
			echo "</div>"

		?>
    </div>
  </ul>
	</div>
</div>

</body>
</html>

