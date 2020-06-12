<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {
	public function user() {
		return $this->belongsTo(User::class);
	}

	public function pesanan_detail() {
		return $this->hasMany('App\Pesanan_detail', 'pesanan_id', 'id');
	}
}
