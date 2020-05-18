
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/profile.css')}}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>
	<div class="profile-card">
			<div class="image-container">
			<img src="">
			<div class="title">
				<h2>{{ Auth::user()->name }}</h2>
				<!-- <h3>Mahasiswa</h3> -->

			</div>
			<a href="/profile/edit"> <input class="btn" type="button" name="" value="Ubah Profil"> </a>

			<div class="main-profile">

				<ul>
					<h3><i class="far fa-envelope"></i>Email</h3>
					<h4>{{ Auth::user()->email }}</h4>
					<h3><i class="far fa-plus-square"></i>Alergi/Penyakit Khusus</h3>
					<h4 class="penyakit">
					<?php
								foreach($riwayat as $r){
									echo $penyakit[(int)$r->id_penyakit-1]->nama." | ";
								}
					?>

					</h4>
					

				</ul>
			</div>
		
		</div>
	</div>


</body>

