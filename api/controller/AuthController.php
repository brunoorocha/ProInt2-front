<?php

require_once 'model/funcionarioDAO.class.php';
require_once 'model/funcionario.class.php';

class AuthController {
    
    private static $key = "luzotica";
    
    public static function authenticate($user, $pass) {                

        $funcionario = new funcionario();
        $funcionario->setLogin($user);
        $funcionario->setSenha($pass);                

        $fDAO = new funcionarioDAO();
       
        if($fDAO->loginFuncionario($funcionario)) {
            return self::getToken($user, $pass, 60*60);
        }

        return false;
    }

    public static function getToken($user, $pass, $sessionTime) {        
        
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        $header = base64_encode(json_encode($header));

        $issueAt = time();
        $expireAt = $issueAt + $sessionTime; 

        $payload = [
            'iat' => $issueAt,
            'exp' => $expireAt, 
            'user' => $user,
            'pass' => $pass
        ];

        $payload = base64_encode(json_encode($payload));
        
        $signature = hash_hmac('sha256', "$header.$payload", self::$key, true);
        $signature = base64_encode($signature);

        $token = "$header.$payload.$signature";

        return $token;
    }

    public static function validate_token($token) {
        $jwt_values = explode('.', $token);
        
        $receivedSignature = $jwt_values[2];
        $receivedHeaderAndPayload = $jwt_values[0] .'.'. $jwt_values[1];

        $resultedSignature = base64_encode(hash_hmac('sha256', $receivedHeaderAndPayload, self::$key, true));
        
        if($receivedSignature === $resultedSignature) {
            
            $payload = base64_decode($jwt_values[1]);
            $payload = json_decode($payload);

            $timeLeft = $payload->exp - time();                                        
            
            if($timeLeft > 0) {                
                return true;
            }            
        }
        
        return false;
    }
}
