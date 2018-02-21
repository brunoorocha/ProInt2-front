<?php

require_once 'funcionario.class.php';
include './conexao.php'; 
class clienteDAO{
    private $bd;
    private function conecta{
    	$this->bd = new conexao("localhost", "root", "", "otica");
    	$con = $this->bd->conectar();
	}
    
    function cadastrarFuncionario($funcionario){
        $login=$funcionario->getLogin();
        $senha=$funcionario->getSenha();
        
        $this->conecta();
        $q = "INSERT INTO funcionario (login,senha) VALUES('$login','$senha')";   
        $stmt = $this->bd->query($q);
    }


    function excluirFuncionario($funcionario){
            $cod_funcionario=$funcionario->getCod_funcionario();
            $this->conecta();
            $q = "DELETE FROM funcionario WHERE cod_funcionario=$cod_funcionario";
            $stmt = $this->bd->query($q);
    }
}