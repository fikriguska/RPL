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
      content: "Id Penyakit";
    }
    table tbody tr td:nth-child(3):before {
      content: "Id Komposisi";
    }
    table tbody tr td:nth-child(4):before {
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
          <a class="nav-item nav-link" href="/admin/user">User</a>
          <a class="nav-item nav-link" href="/admin/saran">Saran</a>
          <a class="nav-item nav-link" href="/admin/produk">Produk</a>
          <a class="nav-item nav-link" href="/admin/komposisi">Komposisi</a>
          <a class="nav-item nav-link" href="/admin/penyakit">Penyakit</a>
          <a class="nav-item nav-link active" href="/admin/larangan">Larangan</a>

        </div>
      </div>
    </nav>
    <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
            <div class="btn btn-success" style="margin-bottom: 10px"><a href="/admin/larangan/create" style="text-decoration: none; color: #fff"> + Tambah</a></div> 
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Id</th>
								<th class="column2">Id penyakit</th>
								<th class="column2">Id Komposisi</th>
								<th class="column1">Aksi</th>
							</tr>
						</thead>
						<tbody>
            @if(count($larangan) > 0)
            @foreach($larangan as $l)
            <tr>
									<td class="column1">{{ $l->id }}</td>
									<td class="column2">{{ $l->id_penyakit }}</td>
									<td class="column2">{{ $l->id_komposisi }}</td>
									<td class="column1"> <a href="/admin/larangan/delete/{{$l->id}}"> <span class="badge badge-danger">hapus</span></a>  </td>
						</tr>
            @endforeach
            @else
            @endif
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>