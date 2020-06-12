@extends('admin.layouts.master')

@section('content')
        <div class="row">





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
                  <h3 class="panel-title"><strong>Data Costumer</strong></h3>

                </div>
                <div class="panel-body no-padding">
                  <table class="table">
                    <thead>
                      <tr>
                          <td><strong>Nama</strong></td>
                          <td><strong>Email</strong></td>
                          <td><strong>No Hp</strong></td>
                          <td><strong>Alamat</strong></td>
                          <td><strong>Aksi</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_users as $users)
                      <tr>
                          <td>{{$users->name}}</td>
                          <td>{{$users->email}}</td>
                          <td>{{$users->nohp}}</td>
                          <td>{{$users->alamat}}</td>
                          <td><a href="{{url('/users/edit/'.$users->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a href="{{url('/users/delete/'.$users->id)}}" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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