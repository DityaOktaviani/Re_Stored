<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Skripsi extends Controller{
    public function index(){
        $data = [
            "judul" => "Data Skripsi"
        ];
        
        echo view('templates/v_header', $data);
		echo view('templates/v_sidebar');
		echo view('templates/v_topbar');
		echo view('home/index');
		echo view('templates/v_footer');
    }
}
