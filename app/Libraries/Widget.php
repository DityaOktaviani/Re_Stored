<?php namespace App\Libraries;

class Widget{

    //untuk membuat widget tanpa ada data yang dimasukan
    public function recentPost(){
        return view('_widget/recentpost');
    }

    //untuk membuat widget dengan data yang dimasukan
    public function recentPost(array $params){
        return view('_widget/recentpost', $params);
    }
}

?>