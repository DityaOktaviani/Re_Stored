<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;

class Peminjaman extends BaseController
{

    public function history(){
        $pinjam = new PeminjamanModel;
        $username = $this->request->getPost('username');
        $data = $pinjam->where('username',$username) ->orderBy('timestamp', 'desc')->findAll(5,0);
        return $this->response->setJSON($data);
    }

    public function pinjam(){
        $pinjam = new PeminjamanModel;
        $book = new BukuModel;
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $id_book = $this->request->getPost('id_book');
        $buku = $book->where('id_buku', $id_book)->first();
        $view = $buku['view'] + 1;
        if($name == null){
            $data =[
                'buku' => $buku['judul'],
                'id_buku' => $id_book,
                'username' => $username,
                'peminjam' => 'admin',
            ];
        } else{
            $data =[
                'buku' => $buku['judul'],
                'id_buku' => $id_book,
                'username' => $username,
                'peminjam' => $name,
            ];
        }
        $data2 = ['view' => $view];
        
        if($pinjam->insert($data)){
            $book->update($id_book, $data2);
            $data = ['status' => 'berhasil'];
        } else{
            $data = ['status' => 'gagal'];
        }
        return $this->response->setJSON($data);
    }

    public function log(){
        $pinjam = new PeminjamanModel;
        $data = $pinjam->findAll();
        return $this->response->setJSON($data);
    }

    public function log_search(){
        $pinjam = new PeminjamanModel;
        $key = $this->request->getPost('key');
        $data = $pinjam->search($key);
        return $this->response->setJSON($data);
    }

}
?>