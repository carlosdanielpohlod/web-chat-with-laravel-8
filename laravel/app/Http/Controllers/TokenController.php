<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function sessionVerify(){
        if(isset($_SESSION)){
            session_start();
        }
        return ;
    }
    public function setAccessToken($data){
        $this->sessionVerify();
        $_SESSION['access_token'] = $data;
    }
    public function getAccessToken(){
        $this->sessionVerify();
        return $_SESSION['access_token'];
    }
}
