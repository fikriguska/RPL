<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
      <a class="navbar-brand" href="#">ADMIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="/admin/user">User</a>
          <a class="nav-item nav-link" href="/admin/saran">Saran</a>
          <a class="nav-item nav-link" href="/admin/produk">Produk</a>
          <a class="nav-item nav-link" href="/admin/komposisi">Komposisi</a>
          <a class="nav-item nav-link active" href="/admin/penyakit">Penyakit</a>
          <a class="nav-item nav-link" href="/admin/larangan">Larangan</a>

        </div>
      </div>
    </nav>
    <div class="limiter">
		<div class="container-table100">
		<div class="wrap-table100">
    @error('name')
    <div style="background-color: red;color : #fff; margin-bottom: 10px;">
                {{ $message }}
    </div>
    @enderror
    @error('password')
    <div style="background-color: red;color : #fff; margin-bottom: 10px;">
                {{ $message }}
    </div>
    @enderror
    @error('email')
            <div style="background-color: red;color : #fff; margin-bottom: 10px;">
                {{ $message }}
            </div>
    @enderror
      <form method="POST" action="{{route('admin_create_penyakit')}}">
      {{ csrf_field() }}

        <div class="form-group row">
          <label for="inputNama3" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" id="inputNama3" placeholder="Nama" >
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </form>
    </div>
    </div>
    </div>


</body>
</html>