<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
    .jumbotron {
  text-align: center;
  margin-top: 70px;
  padding-top: 10px;
  height: 80px;
}
    .card-group{
      margin-top: 200px;
    }
    </style>
</head>
<body>
<div class="jumbotron">
    <h1 class="display-4">SELAMAT DATANG</h1>
    <p class="lead"> di halaman dashboard, <strong>{{ Auth::user()->name }}</p>
    <hr class="my-4" />
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
  </div>

  <div class="card-group">
  <div class="card">
    <div class="card text-white bg-secondary mb-3" style="max-width: 33rem;">
  <div class="card-header">Data Pesawat</div>
  <div class="card-body">
    <a href="{{ route('pesawat1') }}" class="btn btn-danger">Lihat</a>
  </div>
</div>
  </div>
  <div class="card">
   <div class="card text-white bg-secondary mb-3" style="max-width: 33rem;">
  <div class="card-header">Data Mobil</div>
  <div class="card-body">
    <a href="{{ route('mobil1') }}" class="btn btn-danger">Lihat</a>
  </div>
</div>
  </div>
  <div class="card">
     <div class="card text-white bg-secondary mb-3" style="max-width: 33rem;">
  <div class="card-header">DATA KERETA API</div>
  <div class="card-body">
    <a href="{{ route('keretaapi1') }}" class="btn btn-danger">Lihat</a>
  </div>
  </div>
</div>

</body>
</html>