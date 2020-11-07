<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public $tokenController;
    public function __construct(){
        $this->tokenController = new TokenController();
    }

    public function login(Request $request){
        $externalPost = new ExternalRequestController();
        $data = ['email' => $request['email'], 'password' => $request['password']];
        try{
            $token = $externalPost->getAuthToken(env('APP_API_URL')."/auth/login", $data);
            
            $token = json_decode($token,true);
            echo $token['access_token'];
            // $this->tokenController->setAccessToken($token['access_token']);
            // $this->tokenController->getAccessToken();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
}
