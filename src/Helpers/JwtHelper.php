<?php
namespace App\Helpers;
use \Firebase\JWT\JWT;

class JwtHelper {
    public static function response($message) {
        return print_r($message);
    }

    public static function createJWT($payload) {
        $key = "segundoparcial";
        return Jwt::encode($payload, $key);
    }

    public static function validatorJWT($jwt) {
        try {
            $key = "segundoparcial";
            return JWT::decode($jwt, $key, array('HS256'));
        } catch(\Exception $e) {
            throw new \Exception('Login error');
        }
    }
}

