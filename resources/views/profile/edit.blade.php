<!DOCTYPE html>
<html>
<head>
	<title>Ubah Profil</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/editprofile.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/typeahead.css') }}">
  	<script src="{{ asset('assets/js/tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/fontawesome.kit.js') }}"></script>

</head>
<body>

	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
	</div>

	<div class="main-btn">
		<ul>
				<li><a href="/">Beranda</a></li>
				<li><a href="/saran">Saran</a></li>
		</ul>

	</div>
	<!-- Profile card -->
	<div class="profile-card">

		<!-- heading -->
		<div class="heading">
		<!-- enctype="multipart/form-data" -->

			<!-- image container -->
			<div class="image-container">
				<div class="img">
					<img src="/gambar/{{Auth::user()->gambar}}" style="object-fit: cover;">
				</div>
			</div>
	
			<!-- end image container -->

			<!-- right display -->
			<div class="right-display">
				<div class="top-field">

					<!-- <div class="form-group">
						<label class="label">Campus</label class="label">
						<input class="text-field" type="text" name="kampus">
					</div> -->
				</div>
			</div>	
			<!-- right display -->

			
		</div>
		<!-- end heading -->


		<!-- bottom -->
		<div class="bottom">
			<div class="top-field">
				<!-- <div class="form-group">
					<label class="label"><i class="far fa-user"></i> Username</label class="label">
					<input class="text-field" type="text" name="nama">
				</div> -->
				@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
				@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
				@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
				@enderror
		<!-- {!! Form::open(['route'=>['edit_profile', $user->id], 'method'=> 'POST', 'enctype' => 'multipart/form-data']) !!} -->
		<form method="POST" action="{{route('edit_profile', $user->id)}}" enctype="multipart/form-data">

				
		<div class="form-group" style="margin-left: 30px">
						<b>Unggah Gambar</b><br/>
						<input type="file" name="gambar">
			</div>
					<!-- {{ method_field('patch') }} -->
					<div class="form-group">
						<label class="label">Nama</label class="label">
						<input class="text-field" type="text" name="name" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label class="label"><i class="fas fa-lock"></i> Kata Sandi</label class="label">
						<input class="text-field" type="password" name="password">
					</div>
					<div class="form-group">
						<label class="label"><i class="fas fa-lock"></i>Konfirmasi Kata Sandi</label class="label">
						<input class="text-field" type="password" name="newpassword">
					</div>
					<div class="form-group">
						<label class="label"><i class="far fa-envelope"></i> Email</label class="label">
						<input class="text-field" type="text" name="email" value="{{ Auth::user()->email }}">
					</div>
						<label class="label"><i class="far fa-plus-square"></i> Alergi/Penyakit Khusus</label class="label">
					<div class="form-group">
						<input type="text" id="tagstype" name="penyakit" style="width:400px;">
					</div>
					<script>
					        var cities = new Bloodhound({
					          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
					          queryTokenizer: Bloodhound.tokenizers.whitespace,
					          prefetch: '{{ route("json_penyakit") }}'
					          // prefetch: '{{ asset("assets/json/cities.json") }}'
					        });
					        cities.initialize();
						
					        var elt = $('#tagstype');
					        elt.tagsinput({
					          itemValue: 'id',
					          itemText: 'nama',
					          typeaheadjs: {
					            name: 'cities',
					            displayKey: 'nama',
					            source: cities.ttAdapter()
					          }
					        });
							<?php
								foreach($riwayat as $r){
									echo "elt.tagsinput('add', { 'id': $r->id_penyakit, 'nama': '".$penyakit[(int)$r->id_penyakit-1]->nama."' });";
								}
							?>
					</script>
					<div class="form-group">
						<button class="btn-submit" onclick="alert('Profile Saved')" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end bottom -->


	</div>
	<!-- end Profile card -->

</body>
</html>