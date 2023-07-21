@extends('template')

@section('konten')
<button id="tombolku" class="btn btn-primary">Input buku</button>
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
                <input type="text" name="penerbit">
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