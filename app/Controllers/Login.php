<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\AdminModel;
use App\Libraries\Hash;

class Login extends BaseController
{


    //anggota
    public function index() {
        echo view('v_login');
    }

    public function check(){
        $user = new AnggotaModel;
        $username = $this->request->getPost('username');
        $userinfo = $user->where('username', $username)->first();
        return $this->response->setJSON($userinfo);
    }

    public function activing(){
        $user = new AnggotaModel;
        $username = $this->request->getPost('username');
        $userinfo = $user->where('username', $username)->first();
        $pass = $this->request->getPost('password');
        $userinfo['password'] = Hash::make($pass);
        $userinfo['status'] = '2';
        
        if($user->update($userinfo['id_Anggota'],$userinfo)){
            $dummy = [
                'login_token' => true,
                'username' => $username,
                'type' => $userinfo['type_anggota'],
                'id' => $userinfo['type_anggota'],
            ];
            session()->set($dummy);
            $data = ['status' => 'berhasil'];
        }else{
			$data = ['status' => 'gagal'];
		};
        return $this->response->setJSON($data);  
    }

    public function masuk(){
        $user = new AnggotaModel;
        $username = $this->request->getPost('username');
        $userinfo = $user->where('username', $username)->first();
        $pass = $this->request->getPost('password');
    
        if(Hash::check($pass,$userinfo['password'])){
            $dummy = [
                'login_token' => true,
                'username' => $username,
                'type' => $userinfo['type_anggota'],
                'id' => $userinfo['type_anggota'],
            ];
            session()->set($dummy);
            $data = ['status' => 'berhasil'];
        }else{
			$data = ['status' => 'gagal'];
		};
        return $this->response->setJSON($data);  
    }


    //admin
    public function admin() {
        echo view('admin/v_login');
    }

    public function admin_check(){
        $user = new AdminModel;
        $username = $this->request->getPost('username');
        $userinfo = $user->where('username', $username)->first();
        return $this->response->setJSON($userinfo);
    }

    public function admin_activing(){
        $admin = new AdminModel;
        $username = $this->request->getPost('username');
        $admininfo = $admin->where('username', $username)->first();
        $pass = $this->request->getPost('password');
        $admininfo['password'] = Hash::make($pass);
        $admininfo['status'] = '2';
        
        if($admin->update($admininfo['id'],$admininfo)){
            $dummy = [
                'login_token' => true,
                'username' => $username,
                'id' => $admininfo['id'],
            ];
            session()->set($dummy);
            $data = ['status' => 'berhasil'];
        }else{
			$data = ['status' => 'gagal'];
		};
        return $this->response->setJSON($data);  
    }

    public function admin_masuk(){
        $admin = new AdminModel;
        $username = $this->request->getPost('username');
        $admininfo = $admin->where('username', $username)->first();
        $pass = $this->request->getPost('password');
    
        if(Hash::check($pass,$admininfo['password'])){
            $dummy = [
                'login_token' => true,
                'username' => $username,
                'id' => $admininfo['id'],
            ];
            session()->set($dummy);
            $data = ['status' => 'berhasil'];
        }else{
			$data = ['status' => 'gagal'];
		};
        return $this->response->setJSON($data);  
    }
}

