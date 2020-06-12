<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller {

	public function index() {
		$data_users = \App\User::all();

		return view('admin.users.index', ['data_users' => $data_users]);

	}

	public function edit($id) {
		$users = \App\User::find($id);

		return view('admin.users.edit', ['users' => $users]);

	}

	public function update($id, Request $request) {
		$this->validate($request, [
			'password' => 'confirmed',
		]);

		$user = \App\User::where('id', $id)->first();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->nohp = $request->nohp;
		$user->alamat = $request->alamat;
		if (!empty($request->password)) {
			$user->password = bcrypt($request->password);
		}

		$user->update();

		return redirect('/users')->with('sukses', 'Berhasil Mengedit Data!');

	}

	public function delete($id) {
		$users = \App\User::find($id);
		$users->delete($users);

		return redirect('/users')->with('sukses', 'Berhasil Menghapus Data!');

	}
}
