<?php

namespace App\Http\Controllers;

class TransaksiController extends Controller {

	public function index() {
		$pesanans = \App\Pesanan::where('status', 1)->get();

		return view('admin.transaksi.index', compact('pesanans'));

	}

	public function detail($id) {

		$pesanan = \App\Pesanan::where('id', $id)->first();
		$pesanan_details = \App\Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

		return view('admin.transaksi.detail', compact('pesanan', 'pesanan_details'));

	}

	public function transaksi_selesai() {
		$pesanans = \App\Pesanan::where('status', 2)->get();

		return view('admin.transaksi.transaksi_selesai', compact('pesanans'));

	}

	public function detail_selesai($id) {

		$pesanan = \App\Pesanan::where('id', $id)->first();
		$pesanan_details = \App\Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

		return view('admin.transaksi.detail_selesai', compact('pesanan', 'pesanan_details'));

	}

	public function transaksi_gagal() {
		$pesanans = \App\Pesanan::where('status', 3)->get();

		return view('admin.transaksi.transaksi_gagal', compact('pesanans'));

	}

	public function detail_gagal($id) {

		$pesanan = \App\Pesanan::where('id', $id)->first();
		$pesanan_details = \App\Pesanan_detail::where('pesanan_id', $pesanan->id)->get();

		return view('admin.transaksi.detail_gagal', compact('pesanan', 'pesanan_details'));

	}

	public function proses($id, $status) {
		$pesanan = \App\Pesanan::find($id);

		if ($status == 2) {
			$pesanan->status = '2';
		} else {
			$pesanan->status = '3';

			foreach ($pesanan->pesanan_detail as $pesanan_detail) {
				$barang = \App\Barang::where('id', $pesanan_detail->barang_id)->first();
				$barang->stok = $barang->stok + $pesanan_detail->jumlah;
				$barang->save();
			}
		}
		$pesanan->save();

		return redirect('/transaksi')->with('sukses', 'Transaksi Berhasil diproses!');

	}
}
