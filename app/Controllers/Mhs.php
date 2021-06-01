<?php

namespace App\Controllers;

class Mhs extends BaseController
{

    public function index() {
        Mhs::cheking();
    }

    public function mybook() {
        echo view('hello mybook');
    }

    public function cheking(){
        if (session()->get('login_token'))
        {
            $dummy = ['login_token','username','type'];
            echo 'logged in';
            session()->remove($dummy);
        }
        else
        {
            echo 'not logged in';
        }
    }

}

