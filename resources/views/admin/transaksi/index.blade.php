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
                  <h3 class="panel-title"><strong>Data Pesanan Baru</strong></h3>

                    </button>
                </div>
                <div class="panel-body no-padding">
                  <table class="table">
                    <thead>
                      <tr>
                          <td><strong>Tanggal</strong></td>
                          <td><strong>Nama</strong></td>
                          <td><strong>No Hp</strong></td>
                          <td><strong>Alamat</strong></td>
                          <td><strong>Status</strong></td>
                          <td><strong>Jumlah Harga</strong></td>
                          <td><strong>Aksi</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pesanans as $pesanan)
                      <tr>
                          <td>{{$pesanan->tanggal}}</td>
                          <td>{{$pesanan->user->name}}</td>
                          <td>{{$pesanan->user->nohp}}</td>
                          <td>{{$pesanan->user->alamat}}</td>
                          <td>
                              @if($pesanan->status == 1)
                                Sudah Pesan & Belum dibayar
                              @else
                                Sudah dibayar
                              @endif
                          </td>
                          <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</td>
                          <td><a href="{{ url('transaksi/detail/') }}/{{ $pesanan->id }}" class="btn btn-primary">Detail</a>
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