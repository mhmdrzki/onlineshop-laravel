<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model {
	protected $table = 'siswas';

	protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat'];

}
