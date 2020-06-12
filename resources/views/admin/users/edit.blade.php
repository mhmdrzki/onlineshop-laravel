@extends('admin.layouts.master')
@section('content')
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Data Costumer</h3>
          </div>

          <div class="panel-body">
            <form action="{{url('/users/update/'.$users->id)}}" method="post">
              @csrf
              <div class="form-group">
                <label >Nama Costumer</label>
                <input type="text" name="name" class="form-control" value="{{$users->name}}">
              </div>

              <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control" value="{{$users->email}}">
              </div>

              <div class="form-group">
                <label >No Hp</label>
                <input type="text" name="nohp" class="form-control" value="{{$users->nohp}}">
              </div>

              <div class="form-group">
                <label >Alamat</label>
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{$users->alamat}}</textarea>
              </div>

              <div class="form-group">
                <label >Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label >Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
              </div>

              <a class="btn btn-default" href="{{url('/users')}}">Kembali</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>

 @endsection