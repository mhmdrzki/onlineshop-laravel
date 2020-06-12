@extends('admin.layouts.master')
@section('content')
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Data Barang</h3>
          </div>

          <div class="panel-body">
            <form action="{{url('/barang/update/'.$barang->id)}}" method="post">
              @csrf
              <div class="form-group">
                <label >Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{$barang->nama_barang}}">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Plih Kategori Barang</label>
                <select name="kategori_id" class="form-control" id="exampleFormControlSelect1">
                  @foreach($data_kategori as $kategori)
                    @if($kategori->id == $barang->kategori_id)
                      <option value="{{$kategori->id}}" selected>{{$kategori->nama_kategori}}</option>
                      <?php continue;?>
                    @endif
                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label >Harga</label>
                <input type="number" name="harga" class="form-control" value="{{$barang->harga}}">
              </div>

              <div class="form-group">
                <label >Stok</label>
                <input type="number" name="stok" class="form-control" value="{{$barang->stok}}">
              </div>

              <div class="form-group">
                <label >Keterangan</label>
                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3">{{$barang->keterangan}}</textarea>
              </div>
              <a class="btn btn-default" href="{{url('/barang')}}">Kembali</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>

 @endsection