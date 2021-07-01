<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Blog - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pesawat.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                             <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $pesawats->nama) }}" placeholder="Masukkan nama anda">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          

                            <div class="form-group">
                                <label class="font-weight-bold">asal</label>
                                <input type="text" class="form-control @error('asal') is-invalid @enderror" name="asal" value="{{ old('asal', $pesawats->asal) }}" placeholder="Masukkan asal anda">
                            
                                <!-- error message untuk title -->
                                @error('asal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label class="font-weight-bold">tujuan</label>
                                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan', $pesawats->tujuan) }}" placeholder="Masukkan tujuan anda">
                            
                                <!-- error message untuk title -->
                                @error('tujuan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label class="font-weight-bold">keberangkatan</label>
                                <input type="text" class="form-control @error('keberangkatan') is-invalid @enderror" name="keberangkatan" value="{{ old('keberangkatan', $pesawats->keberangkatan) }}" placeholder="Masukkan jadwal anda">
                            
                                <!-- error message untuk title -->
                                @error('keberangkatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</body>
</html>