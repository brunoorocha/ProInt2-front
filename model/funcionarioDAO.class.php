<?php

require_once 'funcionario.class.php';
require_once './conexao.php'; 
class funcionarioDAO{
    private $bd;
    
    
    function cadastrarFuncionario($funcionario){
        $login=$funcionario->getLogin();
        $senha=$funcionario->getSenha();
        
        
        $q = "INSERT INTO funcionario (login,senha) VALUES('$login','$senha')";   
        $conex = new conexao("localhost", "root", "", "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }
    function atualizarFuncionario($funcionario){
            $login=$funcionario->getLogin();
            $senha=$funcionario->getSenha();
            $cod_funci=$funcionario->getCod_funci();



            $q = "UPDATE funcionario SET login='$login', senha='$senha'
                  WHERE cod_funci=$cod_funci";

            $conex = new conexao("localhost", "root", "", "otica");
            $pdo = $conex->conecta();
            $stmt = $pdo->query($q);
        }

    public function retornaFuncionarios(){
        $conexao = new conexao("localhost", "root", "", "otica");
        $PDO = $conexao->conecta();
        $stmt = $PDO->query("SELECT * FROM funcionario");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < $stmt->rowCount(); $i++){
            $funcionario[$i] = new funcionario();
            $funcionario[$i]->setLogin($result[$i]['login']);
            $funcionario[$i]->setSenha($result[$i]['senha']);
            $funcionario[$i]->setCod_funci($result[$i]['cod_funci']);

        }
        return $funcionario;
    }

    function excluirFuncionario($funcionario){
        $cod_funci=$funcionario->getCod_funci();
        
        $q = "DELETE FROM funcionario WHERE cod_funci=$cod_funci";
        $conex = new conexao("localhost", "root", "", "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }
    
}