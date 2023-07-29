@extends('template')

@section('konten')


<h2>Daftar penerbit</h2>
<button id="tombolku" class="btn btn-primary">Input penerbit</button>

<table class="table table-bordered">
<thead>
<tr>
<th scope="col">Nama penerbit</th>
<th scope="col">alamat</th>
<th scope="col">no</th>
<th scope="col">AKSI</th>
</tr>
</thead>
<tbody>
@forelse ($penerbits as $penerbit)
<tr>
<td class="text-center">{{ $penerbit->nama }}</td>
<td class="text-center">{{ $penerbit->alamat }}</td>
<td class="text-center">{{ $penerbit->no }}</td>


<td class="text-center">
<form   action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST">
<a href="{{ route('penerbit.edit', $penerbit->id) }}"
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
        <form action="{{ route('penerbit.store') }}" method="POST" enctype="multipart/form-data" name="form1"> 
        @csrf
        <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama" >
            </div>
           
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">alamat</label>
                <input type="text" name="alamat"class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">no</label>
                <input type="text" name="no" onBlur="masukanno()" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
                <input type="submit" value="SIMPAN" class="btn btn-primary">
                <input type="reset" value="BATAL" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>



@endsection