<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model {
	protected $table = 'barangs';

	protected $fillable = ['nama_barang', 'kategori_id', 'harga', 'stok', 'keterangan'];

	public function pesanan_detail() {
		return $this->hasMany('App\Pesanan_detail', 'barang_id', 'id');
	}

	public function kategori_barang() {
		return $this->belongsTo('App\Kategori_barang', 'kategori_id', 'id');
	}
}
