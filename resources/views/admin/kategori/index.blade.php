@extends('admin.layouts.master')

@section('content')
        <div class="row">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('/kategori/create')}}" method="post">
                            @csrf
                          <div class="form-group">
                            <label >Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" >
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
                  <h3 class="panel-title"><strong>Data Kategori</strong></h3>

                  <button type="button" class="btn btn-default right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Kategori
                    </button>
                </div>
                <div class="panel-body no-padding">
                  <table class="table">
                    <thead>
                      <tr>
                          <td><strong>Nama Kategori</strong></td>
                          <td><strong>Aksi</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_kategori as $kategori)
                      <tr>
                          <td>{{$kategori->nama_kategori}}</td>
                          <td><a href="{{url('/kategori/edit/'.$kategori->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a href="{{url('/kategori/delete/'.$kategori->id)}}" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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