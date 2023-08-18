@extends('template3')

@section('konten')

<div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
                <img width="250px" src="{{ url('/foto/'.$data->foto) }}" lass="rounded" style="width: 100px">
              <h2><strong>{{ $data->nama}}</strong></h2>
              <p class="lead mb-5">{{ $data->ttl}}</p>
            </div>
          </div>
          <div class="col-7">
            <div class="form-group">
              <label for="inputName">Name</label>
              <label for="inputName" class="form-control">{{ $data->nama}}</label>
             
            </div>
            <div class="form-group">
              <label for="inputEmail">Tempat/tanggal lahir</label>
              <label for="inputttl" class="form-control">{{ $data->ttl}}</label>
            </div>
            <div class="form-group">
              <label for="inputSubject">jurusan</label>
              <label for="inputttl" class="form-control">{{ $data->jurusan}}</label>
            </div>
            <div class="form-group">
              <label for="inputMessage">kelas</label>
              <label for="inputttl" class="form-control">{{ $data->kelas}}</label>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Send message">
            </div>
          </div>
        </div>
      </div>
@endsection