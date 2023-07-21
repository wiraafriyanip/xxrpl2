@extends('template')

@section('konten')
<button id="tombolku" class="btn btn-primary">Input biodata</button>
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