@extends('admin.layouts.master')
@section('content')
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Kategori Barang</h3>
          </div>
          <div class="panel-body">
            <form action="{{url('/kategori/update/'.$kategori->id)}}" method="post">
              @csrf
              <div class="form-group">
                <label >Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}">
              </div>

              <a class="btn btn-default" href="{{url('/kategori')}}">Kembali</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>

 @endsection