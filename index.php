<?php
                    
    include './conexao.php'; 
    require_once './controller/produtoController.php';
    require_once './controller/funcionarioController.php';        
    require_once './controller/clienteController.php';                

    $bd = new conexao("localhost", "bruno", "123", "otica");
    $con = $bd->conectar();
    
    $method  = $_SERVER['REQUEST_METHOD'];
    $request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $key     = (count($request) > 1) ? $request[1] : 0;
    $input   = json_decode(file_get_contents('php://input'), true);
    
    if($request[0] != '') {
        $controllerName = ucfirst($request[0]) .'Controller';

        if(!class_exists($controllerName)) {
            http_response_code(404);
            include_once('404.php');              
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