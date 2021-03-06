<?php

class conexao {

     private  $nome;
     private  $usuario;
     private  $senha;
     private  $banco;
     private  $pdo;


     public function __construct($nome, $usuario,$senha,$banco) {
         $this->nome=$nome;
         $this->usuario=$usuario;
         $this->senha=$senha;
         $this->banco=$banco;
     }
     
     public function conectar (){
         
            try{
            
                $this->pdo = new PDO("mysql:host=$this->nome;dbname=$this->banco",  $this->usuario,$this->senha);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->pdo;
            }
            catch (PDOException $e){
            
                echo "Erro ao conectar com o MYSQL:".$e->getMessage();
                  
            }
    
     }
     
    public static function connect (){
        $host = "localhost";
        $user = "bruno";
        $pass = "123";
        $dbname = "otica";
        $connection = NULL;        

        if($connection == NULL) {
            try{        
                $connection = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            }
            catch (PDOException $e){        
                echo "Erro ao conectar com o MYSQL:".$e->getMessage();              
            }
        }        

        return $connection;
    }
            
}
