<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalRequestController extends Controller
{
    public function getAuthToken($url, $data){
        $ch   = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }
}
