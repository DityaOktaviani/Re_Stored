<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{

	//halaman yang bisa di akses admin
	public function index()
	{
		if(Admin::cheking()){
			echo view('admin/v_home');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function dataadmin()
	{
		if(Admin::cheking()){
			echo view('admin/v_dataadmin');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function databuku()
	{
		if(Admin::cheking()){
			echo view('admin/v_databuku');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function datadosen()
	{
		if(Admin::cheking()){
			echo view('admin/v_datadosen');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function datamhs()
	{
		if(Admin::cheking()){
			echo view('admin/v_datamhs');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function datatu()
	{
		if(Admin::cheking()){
			echo view('admin/v_datatu');
		} else {
			return redirect()->to('/login/admin');
		}
	}

	public function peminjaman()
	{
		if(Admin::cheking()){
			echo view('admin/v_peminjaman');
		} else {
			return redirect()->to('/login/admin');
		}
	}


	//fungsi pengecekan admin
	public function cheking(){
        if (session()->get('login_token')){
			return true;
        }else{
            return false;
        }
    }

	//fungsi logout
	public function logout(){
		$dummy = ['login_token','username','id'];
        echo 'logged in';
        session()->remove($dummy);
		return redirect()->to('/login/admin');
	}

	// fungsi tabel admin
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
		$data = $admin->find($id);
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
