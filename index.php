<?php
            
        //conexão
        include './conexao.php'; 
        require_once './controller/produtoController.php';
        require_once './controller/funcionarioController.php';
        require_once './model/produtoDAO.class.php';
        //    require_once './controller/homeController.php';

        $bd = new conexao("localhost", "bruno", "123", "otica");
        $con = $bd->conectar();
            
        //    //inserir os dados de forma automatica
          
        //    if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['classe']) && isset($_POST['metodo'])){
        //        $metodo=$_POST['metodo'];
        //        $classe=$_POST['classe'].'controller';
        //        $controlador = new $classe();
        //         if(strstr($metodo,'/')== TRUE){
        //             $metodo = str_replace('/', '', $metodo);
        //             header("Location: ../$metodo");
        //         }
        //        $controlador->$metodo();
        //    }else if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['classe']) && isset($_GET['metodo'])){
        //        $metodo=$_GET['metodo'];
        //        $classe=$_GET['classe'].'controller';
        //        $controlador = new $classe();
        //         if(strstr($metodo,'/')== TRUE){
        //             $metodo = str_replace('/', '', $metodo);
        //             header("Location: ../$metodo");
        //         }
                
        //        $controlador->$metodo();
        //    }else{
        //        $metodo= 'home';
        //        $classe= 'inicio'.'controller';
        //        $controlador = new $classe();
        //        $controlador->$metodo();   
        //    }
        
        $method  = $_SERVER['REQUEST_METHOD'];
        $request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $key     = (count($request) > 1) ? $request[1] : 0;
        $input   = json_decode(file_get_contents('php://input'), true);
        
        if($method == 'POST') {
            if($request[0] == 'produto') {
                $produtoController = new ProdutoController();
                echo $produtoController->cadastrar($input);
            }
        }

        if($method == 'GET') {
            if($request[0] != '') {
                $controllerName = ucfirst($request[0]) .'Controller';

                if(!class_exists($controllerName)) {
                    http_response_code(404);
                    include_once('404.php');              
                }

                $controllerInstance = new $controllerName();

                $result = $controllerInstance->visualizar_todos();

                if($result == NULL) {                    
                    http_response_code(204);
                } 
                else {
                    echo $result;
                }
            }
            
        }