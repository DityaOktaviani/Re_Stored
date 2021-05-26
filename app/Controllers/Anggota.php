<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
	public function mhs()
	{
		echo view('_layout/page/header');
		echo view('_layout/page/sidebar');
		echo view('admin/v_datamhs');
		echo view('_layout/page/footer');
	}

	public function dosen()
	{
		echo view('_layout/page/header');
		echo view('_layout/page/sidebar');
		echo view('admin/v_datadosen');
		echo view('_layout/page/footer');
	}

	public function tu()
	{
		echo view('_layout/page/header');
		echo view('_layout/page/sidebar');
		echo view('admin/v_datatu');
		echo view('_layout/page/footer');
	}

	public function add(){
		$anggota = new AnggotaModel;
		$data = [
			'username' => $this->request->getPost('username'),
			'nama' => $this->request->getPost('nama'),
			'type_anggota' => $this->request->getPost('type_anggota'),
		];

		$anggota->save($data);
		$data = ['status' => 'Berhasil ditambahkan'];
		return $this->response->setJSON($data);
	}

	public function view(){
		$anggota = new AnggotaModel;
		$id = $this->request->getPost('id');
		$data['anggota'] = $anggota->get_one($id);
		return $this->response->setJSON($data);
	}

	public function edit(){
		$anggota = new AnggotaModel;
		$id_Anggota = $this->request->getPost('id');
		$data = [
			'username' => $this->request->getPost('username'),
			'nama' => $this->request->getPost('nama'),
		];
		$anggota->update($id_Anggota, $data);
		$message = ['status' => 'Berhasil diubah'];
		return $this->response->setJSON($message);
	}

	public function delete(){
		$anggota = new AnggotaModel;
		$anggota->delete($this->request->getPost('id'));
		$message = ['status' => 'Berhasil dihapus'];
		return $this->response->setJSON($message);
	}

	public function get_mhs(){
		$anggota = new AnggotaModel;
		$data['anggota'] = $anggota->get_mhs();
		return $this->response->setJSON($data);
	}

	public function find_mhs(){
		$anggota = new AnggotaModel;
		$keyword = $this->request->getPost('key');
		$data['anggota'] = $anggota->find_mhs($keyword);
		return $this->response->setJSON($data);
	}

	public function get_dosen(){
		$anggota = new AnggotaModel;
		$data['anggota'] = $anggota->get_dosen();
		return $this->response->setJSON($data);
	}

	public function find_dosen(){
		$anggota = new AnggotaModel;
		$keyword = $this->request->getPost('key');
		$data['anggota'] = $anggota->find_dosen($keyword);
		return $this->response->setJSON($data);
	}

	public function get_tu(){
		$anggota = new AnggotaModel;
		$data['anggota'] = $anggota->get_tu();
		return $this->response->setJSON($data);
	}

	public function find_tu(){
		$anggota = new AnggotaModel;
		$keyword = $this->request->getPost('key');
		$data['anggota'] = $anggota->find_tu($keyword);
		return $this->response->setJSON($data);
	}
}
