<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function fetch($url, $method, $data = null, $token = null, $exception = 0){

        $ch = curl_init();

        $timeout = 5;

        if($method=="POST"){
            curl_setopt($ch, CURLOPT_POST, true);
        }

        if($exception == 1 || $method!="POST" && $method!="GET"){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        if($method=="POST" || $method=="PUT" || $exception == 1){
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if($token){
            $authorization = "Authorization: Bearer ".$token;
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        }else{
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        }

        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        $httpcode = curl_getinfo($ch);

        curl_close($ch);

        $response = json_decode($file_contents, true);
        $response['httpcode'] = $httpcode['http_code'];

        if($response['httpcode'] == "401"){
            $token = self::refreshToken($token);
            return $this->fetch($url, $method, $data, $token);
        }

        return $response;
    }

    public static function refreshToken($token){
        $ch = curl_init();

        $timeout = 5;
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("token" => $token)));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt ($ch, CURLOPT_URL, env("API_URL")."auth/refresh");
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        curl_close($ch);

       $response = json_decode($file_contents, true);
       $response['httpcode'] = $httpcode['http_code'];

       session(["token" => $response['data']["token"]]);
       session()->save();

       return $response['data']["token"];
    }
}
