<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller {

	public function index() {
		$data_kategori = \App\Kategori_barang::all();

		return view('admin.kategori.index', ['data_kategori' => $data_kategori]);

	}

	public function create(Request $request) {

		\App\Kategori_barang::create($request->all());

		return redirect('/kategori')->with('sukses', 'Berhasil Menambahkan Data!');

	}

	public function edit($id) {
		$kategori = \App\Kategori_barang::find($id);

		return view('admin.kategori.edit', ['kategori' => $kategori]);

	}

	public function update(Request $request, $id) {
		$kategori = \App\Kategori_barang::find($id);
		$kategori->update($request->all());

		return redirect('/kategori')->with('sukses', 'Berhasil Mengedit Data!');

	}

	public function delete($id) {
		$kategori = \App\Kategori_barang::find($id);
		$kategori->delete($kategori);

		return redirect('/kategori')->with('sukses', 'Berhasil Menghapus Data!');

	}
}
