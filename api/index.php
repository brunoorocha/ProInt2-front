<?php
                    
    include './conexao.php'; 
    require_once './controller/produtoController.php';
    require_once './controller/funcionarioController.php';        
    require_once './controller/clienteController.php'; 
    require_once './controller/refratometriaController.php'; 
    require_once './controller/vendaController.php'; 
    require_once './controller/AuthController.php';   
    
    header("Access-Control-Allow-Origin: *");
    header("");
    
    $method  = $_SERVER['REQUEST_METHOD'];
    $resource = $_GET['resource'];
    $key = isset($_GET['key']) ? $_GET['key'] : 0;
    $searchValue =  isset($_GET['value']) ? $_GET['value'] : '';
    
    $input   = json_decode(file_get_contents('php://input'), true);        
    
    $headers = getallheaders();
    $token = isset($headers['token']) ? $headers['token'] : '';

    if($resource == 'auth') {
        $token = AuthController::authenticate($input["username"], $input["password"]);        

        if($token != '') {
            echo $token;
            return;
        }
        
        http_response_code(401);
        return;
    }
    
    if(!AuthController::validate_token($token)) {
        http_response_code(401);
        return;
    }       

    if($resource != '') {                                
        
        $controllerName = ucfirst($resource) .'Controller';

        if(!class_exists($controllerName)) {
            http_response_code(404);
            include_once('404.php');              
        }                        

        $controllerInstance = new $controllerName();
            
        if($method == 'POST') {                                                       
            echo $controllerInstance->cadastrar($input);
        }

        if($method == 'GET') {            
            if($key == 'search') {            
                $result = $controllerInstance->pesquisar($searchValue);
            } else {
                if($key != 0) {                               
                    // else {
                        $result = $controllerInstance->visualizar_um($key);
                    // }
                }
                else {
                    $result = $controllerInstance->visualizar_todos();                        
                }
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