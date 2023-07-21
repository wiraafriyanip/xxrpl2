@extends('template')

@section('konten')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('biodata.update', $biodata->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $biodata->nama) }}" placeholder="Masukkan nama">
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tempat/tanggal lahir</label>
                            <input type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ old('ttl', $biodata->ttl ) 
                            }}" placeholder="Masukkan Tempat/tanggal lahir">
                             @error('ttl')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div> 
                    <div class="form-group">
                            <label class="font-weight-bold">jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan', $biodata->jurusan) }}" placeholder="Masukkan jurusan biodata">
                            @error('jurusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">kelas</label>
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas', $biodata->kelas) }}" placeholder="Masukkan kelas">
                            @error('kelas')
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
                
@endsection
