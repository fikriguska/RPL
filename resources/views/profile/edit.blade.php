<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/editprofile.css') }}">
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
						<input class="text-field" type="text" name="alergi">
					</div>
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