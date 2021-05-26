<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$query = $db->query('SELECT * from type_anggota');
		$data = $query->getResult();
		if($query){
			echo view('_layout/page/header');
			echo view('_layout/page/sidebar');
			echo view('admin/v_home');
			echo view('_layout/page/footer');
		}else{
			echo "failed";
		}
	}

	public function add_mhs(){
		$anggota = new HomeModel;
		$data = [
			'username' => $this->request->getPost('username'),
			'nama' => $this->request->getPost('nama'),
			'type_anggota' => $this->request->getPost('type_anggota'),
		];

		$anggota->save($data);
		$data = ['status' => 'Berhasil ditambahkan'];
		return $this->response->setJSON($data);
	}

	public function get_mhs(){
		$anggota = new HomeModel;
		$data['anggota'] = $anggota->get_all();
		return $this->response->setJSON($data);
	}

	public function view_mhs(){
		$anggota = new HomeModel;
		$id = $this->request->getPost('id');
		$data['anggota'] = $anggota->get_one($id);
		return $this->response->setJSON($data);
	}

	public function edit_mhs(){
		$anggota = new HomeModel;
		$id_Anggota = $this->request->getPost('id');
		$data = [
			'username' => $this->request->getPost('username'),
			'nama' => $this->request->getPost('nama'),
		];
		$anggota->update($id_Anggota, $data);
		$message = ['status' => 'Berhasil diubah'];
		return $this->response->setJSON($message);
	}

	public function delete_mhs(){
		$anggota = new HomeModel;
		$anggota->delete($this->request->getPost('id'));
		$message = ['status' => 'Berhasil dihapus'];
		return $this->response->setJSON($message);
	}
}
