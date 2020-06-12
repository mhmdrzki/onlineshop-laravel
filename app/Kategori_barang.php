<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_barang extends Model {
	protected $table = 'kategori_barangs';

	protected $fillable = ['nama_kategori'];

	public function barang() {
		return $this->hasMany('App\Barang', 'kategori_id', 'id');
	}
}
