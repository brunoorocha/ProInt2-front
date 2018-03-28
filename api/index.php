<?php
                    
    include './conexao.php'; 
    require_once './controller/produtoController.php';
    require_once './controller/funcionarioController.php';        
    require_once './controller/clienteController.php'; 
    require_once './controller/AuthController.php';   
    
    header("Access-Control-Allow-Origin: *");
    header("");
    
    $method  = $_SERVER['REQUEST_METHOD'];
    $resource = $_GET['resource'];
    $key = isset($_GET['key']) ? $_GET['key'] : 0;
    // $request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    // $lastIdx = count($request) - 1;
    // $key     = (count($request) > 1) ? $request[$lastIdx] : 0;

    // $resource = is_numeric($request[$lastIdx]) ? $request[$lastIdx - 1] : $request[$lastIdx];    
    // // echo "<br>res: $resource | key: $key | last index: $lastIdx <br>";
    // print_r($_GET);
    $input   = json_decode(file_get_contents('php://input'), true);        

    if($resource != '') {
        $controllerName = ucfirst($resource) .'Controller';

        if(!class_exists($controllerName)) {
            http_response_code(404);
            include_once('404.php');              
        }        
        
        if($resource == 'auth') {            
            if($key != 0) {                
                return $controllerName::validate_token($key);
            }

            $token = $controllerName::authenticate("victoria", "admin");            
            echo $token;
            return $token;
        }

        $controllerInstance = new $controllerName();
            
        if($method == 'POST') {                                                       
            echo $controllerInstance->cadastrar($input);
        }

        if($method == 'GET') { 
            if($key != 0) {
                $result = $controllerInstance->visualizar_um($key);
            }
            else {
                $result = $controllerInstance->visualizar_todos();                        
            }

            if($result == NULL) {                    
                http_response_code(204);
            } 
            else {
                echo $result;
            }                        
        }

        if($method == 'DELETE') {            
            if($key != 0) {                                
                $result = $controllerInstance->excluir($key);
            }

            echo $result;
        }

        if($method == 'PUT') {
            if($key != 0) {                                             
                $result = $controllerInstance->alterar($input);
                echo $result;
            }            
        }
    }