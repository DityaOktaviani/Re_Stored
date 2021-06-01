<?php
namespace App\Libraries;

class Hash
{
    public static function make($pass){
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public static function check($pass,$pass_db){
        if(password_verify($pass,$pass_db)){
            return true;
        } else{
            return false;
        }
    }
}

?>