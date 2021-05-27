<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('admin/v_home');
	}

	public function dataadmin()
	{
		echo view('admin/v_dataadmin');
	}

	public function databuku()
	{
		echo view('admin/v_databuku');
	}

	public function datadosen()
	{
		echo view('admin/v_datadosen');
	}

	public function datamhs()
	{
		echo view('admin/v_datamhs');
	}

	public function datatu()
	{
		echo view('admin/v_datatu');
	}

	public function add(){
		$admin = new AdminModel;
		$data = ['username' => $this->request->getPost('username'),];

		$admin->save($data);
		$data = ['status' => 'Berhasil ditambahkan'];
		return $this->response->setJSON($data);
	}

	public function view(){
		$admin = new AdminModel;
		$id = $this->request->getPost('id');
		$data['admin'] = $admin->view($id);
		return $this->response->setJSON($data);
	}

	public function edit(){
		$admin = new AdminModel;
		$id_admin = $this->request->getPost('id');
		$data = [
			'username' => $this->request->getPost('username')
		];
		$admin->update($id_admin, $data);
		$message = ['status' => 'Berhasil diubah'];
		return $this->response->setJSON($message);
	}

	public function delete(){
		$admin = new AdminModel;
		$admin->delete($this->request->getPost('id'));
		$message = ['status' => 'Berhasil dihapus'];
		return $this->response->setJSON($message);
	}

	public function get(){
		$admin = new AdminModel;
		$data['admin'] = $admin->get();
		return $this->response->setJSON($data);
	}

	public function find(){
		$admin = new AdminModel;
		$keyword = $this->request->getPost('key');
		$data['admin'] = $admin->search($keyword);
		return $this->response->setJSON($data);
	}
}
