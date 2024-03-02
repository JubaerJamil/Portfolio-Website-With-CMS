<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class JWTToken{

    public static function createtoken($userEmail):string{
        $key = env('JWT_KEY');

        $playload = [
            'iss' => 'laravel-jwt',
            'iat' => time(),
            'exp' => time() + 60*60*24,
            'userEmail' => $userEmail

        ];

        return JWT::encode($playload, $key, 'HS256');
    }


    public static function createtokenforverify($userEmail):string{
        $key = env('JWT_KEY');

        $playload = [
            'iss' => 'laravel-jwt',
            'iat' => time(),
            'exp' => time() + 60*15,
            'userEmail' => $userEmail
        ];

        return JWT::encode($playload, $key, 'HS256');
    }


    public static function verifytoken($token):string{
        try
        {
            if ($token==null){
                return 'unauthorized';
            }else{
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new key($key, 'HS256'));
            return $decode->userEmail;
            }
        }
        catch(Exception $e)
        {
            return 'unauthorized';
            // return $e->getMessage();
        };
    }



}