<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller {

	public function index() {
		$data_barang = \App\Barang::all();
		$data_kategori = \App\Kategori_barang::all();

		return view('admin.barang.index', ['data_barang' => $data_barang, 'data_kategori' => $data_kategori]);

	}

	public function create(Request $request) {

		\App\Barang::create($request->all());

		return redirect('/barang')->with('sukses', 'Berhasil Menambahkan Data!');

	}

	public function edit($id) {
		$barang = \App\Barang::find($id);
		$data_kategori = \App\Kategori_barang::all();

		return view('admin.barang.edit', ['barang' => $barang, 'data_kategori' => $data_kategori]);

	}

	public function update(Request $request, $id) {
		$barang = \App\Barang::find($id);
		$barang->update($request->all());

		return redirect('/barang')->with('sukses', 'Berhasil Mengedit Data!');

	}

	public function delete($id) {
		$barang = \App\Barang::find($id);
		$barang->delete($barang);

		return redirect('/barang')->with('sukses', 'Berhasil Menghapus Data!');

	}
}
