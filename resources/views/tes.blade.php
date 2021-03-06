<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/typeahead.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/tagsinput.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
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
          <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
      <form method="POST" action="{{route('admin_create_produk')}}">
      {{ csrf_field() }}

        <div class="form-group row">
          <label for="inputNama3" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" id="inputNama3" placeholder="Nama" >
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Komposisi</label>
          <div class="col-sm-10">
            <input type="text" name="komposisi" class="form-control" id="inputEmail3" placeholder="Komposisi">
          </div>
        </div>


        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </form>
    </div>
    




<div class="form-group">
    <label>Typeahed</label>
    <input type="text" id="tagstype" style="width:400px;">
</div>
<script>
        var cities = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('nama'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: '{{ route("komposisi") }}'
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
</script>


    </div>
    </div>


</body>
</html>

