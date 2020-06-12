@extends('admin.layouts.master')
@section('content')
        <div class="panel">
          <div class="panel-heading">
            <h3><i class="fa fa-shopping-cart"></i> Detail Pesanan</h3>
          </div>
          <div class="panel-body">

            <div class="col-md-12">

                <div class="card mt-2">
                    <div class="card-body">

                        @if(!empty($pesanan))
                        <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                    </td>
                                    <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td>{{ $pesanan_detail->jumlah }} kain</td>
                                    <td align="right">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>

                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>

                                </tr>
                                 <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>

                                </tr>
                                <!-- @if($pesanan->status == 1) -->
                                <tr>
                                    <td colspan="5" align="right"></td>
                                    <td align="right">
                                        <a href="{{ url('transaksi/proses') }}/{{ $pesanan->id }}/2" class="btn btn-primary">Terima Pesanan</a>
                                        <a href="{{ url('transaksi/proses') }}/{{ $pesanan->id }}/3" class="btn btn-danger">Tolak</a>
                                    </td>

                                </tr>
                                <!-- @endif -->
                            </tbody>
                        </table>
                        @endif

                    </div>
                </div>
            </div>

          </div>
        </div>

 @endsection