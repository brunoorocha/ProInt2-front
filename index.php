<?php
            
           //conexão
           include './conexao.php'; 
           require_once './controller/produtoController.php';
           require_once './controller/homeController.php';
           $bd = new conexao("localhost", "root", "", "mercado");
           $con = $bd->conectar();
            
           //inserir os dados de forma automatica
          
           if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['classe']) && isset($_POST['metodo'])){
               $metodo=$_POST['metodo'];
               $classe=$_POST['classe'].'controller';
               $controlador = new $classe();
                if(strstr($metodo,'/')== TRUE){
                    $metodo = str_replace('/', '', $metodo);
                    header("Location: ../$metodo");
                }
               $controlador->$metodo();
           }else if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['classe']) && isset($_GET['metodo'])){
               $metodo=$_GET['metodo'];
               $classe=$_GET['classe'].'controller';
               $controlador = new $classe();
                if(strstr($metodo,'/')== TRUE){
                    $metodo = str_replace('/', '', $metodo);
                    header("Location: ../$metodo");
                }
                
               $controlador->$metodo();
           }else{
               $metodo= 'home';
               $classe= 'inicio'.'controller';
               $controlador = new $classe();
               $controlador->$metodo();   
           }
