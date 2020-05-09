
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/profile.css')}}">
	<script src="https://kit.fontawesome.com/4814c1385c.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="profile-card">
			<div class="image-container">
			<img src="">
			<div class="title">
				<h2>{{ Auth::user()->name }}</h2>
				<h3>Mahasiswa</h3>

			</div>
			<a href="/profile/edit"> <input class="btn" type="button" name="" value="Edit Profile"> </a>

			<div class="main-profile">

				<ul>
					<h3><i class="far fa-envelope"></i>Email</h3>
					<h4>{{ Auth::user()->email }}</h4>
					<h3><i class="far fa-plus-square"></i>Alergi/Penyakit Khusus</h3>
					<h4>{{ Auth::user()->id_penyakit }}</h4>
					

				</ul>
			</div>
		
		</div>
	</div>


</body>

