<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/typeahead.css') }}">
  	<script src="{{ asset('assets/js/tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css')}}">

    <style>
        html, body{
          font-family: 'Roboto', sans-serif;
        }
        @media screen and (max-width: 992px) {
    table {
      display: block;
    }
    table > *, table tr, table td, table th {
      display: block;
    }
    table thead {
      display: none;
    }
    table tbody tr {
      height: auto;
      padding: 37px 0;
    }
    table tbody tr td {
      padding-left: 40% !important;
      margin-bottom: 24px;
    }
    table tbody tr td:last-child {
      margin-bottom: 0;
    }
    table tbody tr td:before {
      font-size: 14px;
      color: #999999;
      line-height: 1.2;
      font-weight: unset;
      position: absolute;
      width: 40%;
      left: 30px;
      top: 0;
    }
    table tbody tr td:nth-child(1):before {
      content: "Id";
    }
    table tbody tr td:nth-child(2):before {
      content: "Penyakit";
    }
    table tbody tr td:nth-child(3):before {
      content: "Nama";
    }
    table tbody tr td:nth-child(4):before {
      content: "Email";
    }
    table tbody tr td:nth-child(5):before {
      content: "Admin";
    }
    table tbody tr td:nth-child(6):before {
      content: "Aksi";
    }
  
    .column4,
    .column5,
    .column6 {
      text-align: left;
    }
  
    .column4,
    .column5,
    .column6,
    .column1,
    .column2,
    .column3 {
      width: 100%;
    }
  
    tbody tr {
      font-size: 14px;
    }
  }
    </style>


    <title>Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">ADMØØN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="/admin/user">User</a>
          <a class="nav-item nav-link" href="/admin/saran">Saran</a>
          <a class="nav-item nav-link" href="/admin/produk">Produk</a>
          <a class="nav-item nav-link" href="/admin/komposisi">Komposisi</a>
          <a class="nav-item nav-link" href="/admin/penyakit">Penyakit</a>
          <a class="nav-item nav-link" href="/admin/larangan">Larangan</a>

        </div>
      </div>
    </nav>
    <div class="limiter">
		<div class="container-table100">
		<div class="wrap-table100">
    @error('nama')
    <div style="background-color: red;color : #fff; margin-bottom: 10px;">
                {{ $message }}
    </div>
    @enderror
    @error('komposisi')
    <div style="background-color: red;color : #fff; margin-bottom: 10px;">
                {{ $message }}
    </div>
    @enderror
      <form method="POST" action="{{route('admin_edit_profile', $user->id)}}">
					{{ csrf_field() }}

        <div class="form-group row">
          <label for="inputNama3" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputNama3" placeholder="Nama" value="{{ $user->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword2" name="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword32" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputAdmin" class="col-sm-2 col-form-label">Admin</label>
          <div class="col-sm-10">
            <input type="number" name="admin" class="form-control" id="inputAdmin" placeholder="Admin" value="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group">
            <label for="inputNama3" class="col-sm-2 col-form-label">Penyakit</label>
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
                  foreach($penyakit as $p){
                    if($r->id_penyakit == $p->id){
                      echo "elt.tagsinput('add', { 'id': $p->id, 'nama': '".$p->nama."' });";
                    }
                  }
								}
							?>
					</script>
        <!-- <label for="inputadmin">Example select</label>
        <select class="form-control" id="inputadmin">
            <option value="1">1</option>
            <option value="2">2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select> -->

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">edit</button>
          </div>
        </div>
      </form>
    </div>
    </div>
    </div>


</body>
</html>