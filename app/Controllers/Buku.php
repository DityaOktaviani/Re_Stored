<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
	public function buku()
	{
		echo view('_layout/page/header');
		echo view('_layout/page/sidebar');
		echo view('admin/v_databuku');
		echo view('_layout/page/footer');
	}

	public function add(){
		$buku = new BukuModel;
		$file = $this->request->getFile('file');
		$judul = $this->request->getPost('judul');
		$penulis = $this->request->getPost('penulis');
		$pemilik = $this->request->getPost('pemilik');
		if( $file->isValid() && ! $file->hasMoved() ){
			$filename = "file".$judul."penulis".$penulis;
			$file->move('upload/', $filename);
		};
		if($pemilik == '' || $pemilik == null){
			$data = [
				'judul'=> $this->request->getPost('judul'),
				'penulis'=> $this->request->getPost('penulis'),
				'link'=> $filename,
				'type_buku'=> $this->request->getPost('jenis'),
				'abstrak'=> $this->request->getPost('abstrak'),
				'tahun'=> $this->request->getPost('tahun'),
			];
		}else {
			$data = [
				'judul'=> $this->request->getPost('judul'),
				'penulis'=> $this->request->getPost('penulis'),
				'link'=> $filename,
				'type_buku'=> $this->request->getPost('jenis'),
				'abstrak'=> $this->request->getPost('abstrak'),
				'tahun'=> $this->request->getPost('tahun'),
				'pemilik_buku' => $this->request->getPost('pemilik'),
			];
		}

		if($buku->save($data)){
			$data = ['status' => 'berhasil'];
		}else{
			$data = ['status' => 'gagal'];
		};
		return $this->response->setJSON($data);
	}

	public function view(){
		$buku = new BukuModel;
		$id = $this->request->getPost('id');
		$data['buku'] = $buku->view($id);
		return $this->response->setJSON($data);
	}

	public function edit(){
		$buku = new BukuModel;
		$id_buku = $this->request->getPost('eid_buku');
		$old = $buku->find($id_buku);
		$old_file = $old['link'];
		$judul = $this->request->getPost('ejudul');
		$penulis = $this->request->getPost('epenulis');
		$file = $this->request->getFile('efile');

		if( $file->isValid() && ! $file->hasMoved() ){
			$filename = "file".$judul."penulis".$penulis;
			if(file_exists("upload/".$old_file)){
				unlink("upload/".$old_file);
			}else{
				$message = ['status' => 'ga'];
			};
			$file->move('upload/', $filename);
		};

		$data = [
			'judul'=> $this->request->getPost('ejudul'),
			'penulis'=> $this->request->getPost('epenulis'),
			'link'=> $filename,
			'abstrak'=> $this->request->getPost('eabstrak'),
			'tahun'=> $this->request->getPost('etahun'),
		];

		if($buku->update($id_buku,$data)){
			$data = ['status' => 'berhasil'];
		}else{
			$data = ['status' => 'gagal'];
		};
		return $this->response->setJSON($data);
	}

	public function delete(){
		$buku = new BukuModel;
		$id_buku = $this->request->getPost('id');
		$old = $buku->find($id_buku);
		$old_file = $old['link'];
		unlink("upload/".$old_file);
		$buku->delete($id_buku);
		$message = ['status' => 'Berhasil dihapus'];
		return $this->response->setJSON($message);
	}

	public function get(){
		$buku = new BukuModel;
		$data['buku'] = $buku->get();
		return $this->response->setJSON($data);
	}

	public function get_r(){
		$buku = new BukuModel;
		$data['buku'] = $buku->get_r();
		return $this->response->setJSON($data);
	}

	public function find(){
		$buku = new BukuModel;
		$keyword = $this->request->getPost('key');
		$data['buku'] = $buku->search($keyword);
		return $this->response->setJSON($data);
	}

	public function find_r(){
		$buku = new BukuModel;
		$keyword = $this->request->getPost('key');
		$data['buku'] = $buku->search_r($keyword);
		return $this->response->setJSON($data);
	}

	public function new_book(){
		$buku = new BukuModel;
		$data = $buku->where('dikonfirmasi','2')->orderBy('timestamp', 'desc')->findAll(5,0);
        return $this->response->setJSON($data);
	}

	public function fav_book(){
		$buku = new BukuModel;
		$data = $buku->where('dikonfirmasi','2')->orderBy('view', 'desc')->findAll(5,0);
        return $this->response->setJSON($data);
	}

	public function acc(){
		$buku = new BukuModel;
		$id = $this->request->getPost('id');
		$data = $buku->where('id_buku',$id)->first();
		$update = ['dikonfirmasi' => '2'];
		if($buku->update($id,$update)){
			$data = ['status' => 'success'];
		} else {
			$data = ['status' => 'gagal'];
		}
        return $this->response->setJSON($data);
	}
}
