<?php

namespace App\Controllers;

class Tu extends BaseController
{
    public function index()
	{
		if(Tu::cheking()){
			echo view('tu/v_home');
		} else {
			return redirect()->to('/login');
		}
	}

	public function databuku()
	{
		if(Tu::cheking()){
			echo view('tu/v_databuku');
		} else {
			return redirect()->to('/login');
		}
	}

	public function datadosen()
	{
		if(Tu::cheking()){
			echo view('tu/v_datadosen');
		} else {
			return redirect()->to('/login');
		}
	}

	public function datamhs()
	{
		if(Tu::cheking()){
			echo view('tu/v_datamhs');
		} else {
			return redirect()->to('/login');
		}
	}

    public function mybook() {
        echo view('hello mybook');
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

