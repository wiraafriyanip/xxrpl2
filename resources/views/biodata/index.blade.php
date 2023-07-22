@extends('template')

@section('konten')
<button id="tombolku" class="btn btn-primary">Input biodata</button>
<hr>
<h2>Daftar biodata</h2>
<body style="background: lightgray">
<div class="container mt-5">
<div class="row">
<div class="col-md-12">
<div class="card border-0 shadow rounded">
<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
<th scope="col">Nama</th>
<th scope="col">Tempat/ tanggal lahir</th>
<th scope="col">Jurusan</th>
<th scope="col">kelas</th>
<th scope="col">AKSI</th>
</tr>
</thead>
<tbody>
@forelse ($biodatas as $biodata)
<tr>
<td class="text-center">{{ $biodata->nama }}</td>
<td class="text-center">{{ $biodata->ttl }}</td>
<td class="text-center">{{ $biodata->jurusan }}</td>
<td class="text-center">{{ $biodata->kelas }}</td>


<td class="text-center">
<form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('biodata.destroy', $biodata->id) }}" method="POST">
<a href="{{ route('biodata.edit', $biodata->id) }}"
class="btn btn-sm btn-primary">EDIT</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
</form>
</td>
</tr>
@empty
<div class="alert alert-danger">
Data Blog belum Tersedia.
</div>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</script>
<script
src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
//message with toastr
@if(session()-> has('success'))
toastr.success('{{ session('success') }}', 'BERHASIL!');
@elseif(session()-> has('error'))
toastr.error('{{ session('error') }}', 'GAGAL!');
@endif
</script>

<div id="myModal" class="penghalang">
    <div class="modal-content">
        <span id="tutup">&times;</span>
        <p>Form input bio data</p>
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data" name="form1"> 
        @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" onBlur="masukannama()" onFocus="window.status='Silahkan Mengisi nama Anda';">
            </div>
            <div class="form-group">
                <label>Tempat/ Tanggal lahir</label>
                <input type="text" name="ttl" onBlur="masukanttl()" onFocus="window.status='Silahkan Mengisi tempat/tanggal lahir Anda';">
            </div>
            <div class="form-group">
                <label>jurusan</label>
                <input type="text" name="jurusan" onBlur="masukanjurusan()" onFocus="window.status='Silahkan Mengisi jurusan Anda';">
            </div>
            <div class="form-group">
                <label>kelas</label>
                <input type="text" name="kelas" onBlur="masukankelas()" onFocus="window.status='Silahkan Mengisi kelas Anda';">
            </div>
            
            <div>
                <input type="submit" value="SIMPAN" class="btn btn-primary">
                <input type="reset" value="BATAL" class="btn btn-danger">
               

            </div>
        </form>
    </div>
</div>


@endsection