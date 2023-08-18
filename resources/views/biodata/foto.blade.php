@extends('template3')

@section('konten')


<form action="{{ route('foto.update', $data->id) }}" method="post"enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
                    <label for="exampleInputFile">pilih file foto di perangkat anda</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" >Upload</span>
                      </div>

                    </div>
                 
                  <div class="form-group">
                  <input type="submit" value="SIMPAN" class="btn btn-primary">
                
                  </div>
 </div>
</form>

@endsection