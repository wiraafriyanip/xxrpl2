@extends('template')

@section('konten')
<h2>Daftar buku</h2>
<button id="tombolku" class="btn btn-primary">Input buku</button>

<table class="table table-bordered">
<thead>
<tr>
<th scope="col">Judul Buku</th>
<th scope="col">penerbit</th>
<th scope="col">jumlah</th>
<th scope="col">AKSI</th>
</tr>
</thead>
<tbody>
@forelse ($bukus as $buku)
<tr>
<td class="text-center">{{ $buku->judul }}</td>
<td class="text-center">{{ $buku->relasipenerbit->nama }}</td>
<td class="text-center">{{ $buku->jumlah }}</td>


<td class="text-center">
<form   action="{{ route('buku.destroy', $buku->id) }}" method="POST">
<a href="{{ route('buku.edit', $buku->id) }}"
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
        <p>Form input buku</p>
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul">
            </div>
            <div class="form-group">
                <label>penerbit</label>
                <select name="penerbit" id="">
                @forelse ($penerbits as $penerbit)

                    <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                    @empty
                    <div class="alert alert-danger">
                    Data Blog belum Tersedia.
                    </div>
                    @endforelse
                </select>
            
            </div>
            <div class="form-group">
                <label>jumlah</label>
                <input type="text" name="jumlah">
            
            <div>
                <input type="submit" value="SIMPAN" class="btn btn-primary">
                <input type="reset" value="BATAL" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>


@endsection