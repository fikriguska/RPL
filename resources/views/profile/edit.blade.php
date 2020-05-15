<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/editprofile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/typeahead.css') }}">

	<script src="{{ asset('assets/js/tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
	<script src="https://kit.fontawesome.com/4814c1385c.js" crossorigin="anonymous"></script>
</head>
<body>

	<div class="logo">
		<img src="{{ asset('assets/img/logo.png') }}" alt="logo">
	</div>

	<div class="main-btn">
		<ul>
				<li><a href="/home">Home</a></li>
				<li><a href="/saran">Saran</a></li>
		</ul>

	</div>
	<!-- Profile card -->
	<div class="profile-card">

		<!-- heading -->
		<div class="heading">

			<!-- image container -->
			<div class="image-container">
				<div class="img">
					<img src="test.png">
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
				
				{!! Form::open(['route'=>['edit_profile', $user->id], 'method'=> 'POST']) !!}
					{{ csrf_field() }}
					<!-- {{ method_field('patch') }} -->

					<div class="form-group">
						<label class="label">Name</label class="label">
						<input class="text-field" type="text" name="name" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label class="label"><i class="fas fa-lock"></i> Password</label class="label">
						<input class="text-field" type="password" name="password">
					</div>
					<div class="form-group">
						<label class="label"><i class="fas fa-lock"></i>New Password</label class="label">
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
						<button class="btn-submit" onclick="alert('Profile Saved')" type="submit">Save</button>
					</div>
				</form>
			</div>
		</div>
		<!-- end bottom -->


	</div>
	<!-- end Profile card -->

</body>
</html>