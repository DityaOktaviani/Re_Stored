<?php

namespace App\Controllers;

class Mhs extends BaseController
{

    public function index()
	{
		if(Mhs::cheking()){
			echo view('mhs/v_home');
		} else {
			return redirect()->to('/login');
		}
	}

	public function mybook()
	{
		if(Mhs::cheking()){
			echo view('mhs/v_bukuku');
		} else {
			return redirect()->to('/login');
		}
	}

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
		return redirect()->to('/login');
	}

}

