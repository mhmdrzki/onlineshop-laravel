@extends('admin.layouts.master')

@section('content')
        <div class="row">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('/barang/create')}}" method="post">
                            @csrf
                          <div class="form-group">
                            <label >Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" >
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Plih Kategori Barang</label>
                            <select name="kategori_id" class="form-control" id="exampleFormControlSelect1">
                              @foreach($data_kategori as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label >Harga</label>
                            <input type="number" name="harga" class="form-control" >
                          </div>

                          <div class="form-group">
                            <label >Stok</label>
                            <input type="number" name="stok" class="form-control" >
                          </div>

                          <div class="form-group">
                            <label >Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>



            <div class="col-md-12">
              @if(session('sukses'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-check-circle"></i> {{session('sukses')}}
              </div>
                @endif
              <!-- TABLE NO PADDING -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title"><strong>Data Barang</strong></h3>

                  <button type="button" class="btn btn-default right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Barang
                    </button>
                </div>
                <div class="panel-body no-padding">
                  <table class="table">
                    <thead>
                      <tr>
                          <td><strong>Nama Barang</strong></td>
                          <td><strong>Harga</strong></td>
                          <td><strong>Stok</strong></td>
                          <td><strong>Keterangan</strong></td>
                          <td><strong>Aksi</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_barang as $barang)
                      <tr>
                          <td>{{$barang->nama_barang}}</td>
                          <td>{{$barang->harga}}</td>
                          <td>{{$barang->stok}}</td>
                          <td>{{$barang->keterangan}}</td>
                          <td><a href="{{url('/barang/edit/'.$barang->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a href="{{url('/barang/delete/'.$barang->id)}}" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END TABLE NO PADDING -->

            </div>

        </div>
@endsection