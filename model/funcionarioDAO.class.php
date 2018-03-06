<?php

require_once 'funcionario.class.php';
require_once './conexao.php'; 
class funcionarioDAO{
    private $bd;
    private $MYSQL_USER = "bruno";
    private $MYSQL_PASS = "123";
    
    function cadastrarFuncionario($funcionario){
        $login=$funcionario->getLogin();
        $senha=$funcionario->getSenha();
        $nome=$funcionario->getNome();
        
        
        $q = "INSERT INTO funcionario (login,senha) VALUES('$login','$senha','$nome')";   
        $conex = new conexao("localhost", $this->MYSQL_USER, $this->MYSQL_PASS, "otica");
        $pdo = $conex->conectar();
        $stmt = $pdo->query($q);
    }

    function atualizarFuncionario($funcionario){
            $login=$funcionario->getLogin();
            $senha=$funcionario->getSenha();
            $nome=$funcionario->getNome();
            $cod_funci=$funcionario->getCod_funci();

            $q = "UPDATE funcionario SET login='$login', senha='$senha', nome='$nome'
                  WHERE cod_funci=$cod_funci";

            $conex = new conexao("localhost", $this->MYSQL_USER, $this->MYSQL_PASS, "otica");
            $pdo = $conex->conectar();
            $stmt = $pdo->query($q);
        }

    public function retornaFuncionarios(){
        $conexao = conexao::connect();            
        $stmt = $conexao->query("SELECT * FROM funcionario");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0) {            
            return NULL;
        }

        $funcionarios = array();
        
        for($i = 0; $i < $stmt->rowCount(); $i++){
            $funcionario = array();
            $funcionario['login'] = $result[$i]['login'];
            $funcionario['senha'] = $result[$i]['senha'];
            $funcionario['nome'] = $result[$i]['nome'];            
            $funcionario['cod_funci'] = $result[$i]['cod_funci'];            

            array_push($funcionarios, $funcionario);
        }

        return $funcionarios;
    }

    function excluirFuncionario($funcionario){
        $cod_funci=$funcionario->getCod_funci();
        
        $q = "DELETE FROM funcionario WHERE cod_funci=$cod_funci";
        $conex = new conexao("localhost", $this->MYSQL_USER, $this->MYSQL_PASS, "otica");
        $pdo = $conex->conectar();
        $stmt = $pdo->query($q);
    }

    function loginFuncionario($fun){
        $login = $fun->getLogin();
        $senha = $fun->getSenha();

        $conexao = new conexao("localhost", $this->MYSQL_USER, $this->MYSQL_PASS, "otica");
        $PDO = $conexao->conectar();
        $stmt = $PDO->query("SELECT * FROM funcionario");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < $stmt->rowCount(); $i++){
            $funcionario[$i] = new funcionario();
            $funcionario[$i]->setLogin($result[$i]['login']);
            $funcionario[$i]->setSenha($result[$i]['senha']);
            $funcionario[$i]->setCod_funci($result[$i]['cod_funci']);

        }
        foreach ($funcionario as $linha) {
                  $loginO = $linha->getLogin();
                  $senhaO = $linha->getSenha();
                  if ($loginO == $login && $senhaO == $senha) {
                      echo "<h1>Usuário logado com sucesso!</h1>";
                  }else{
                    echo "<h1>Usuário ou senha incorretos!</h1>";
                  }
           }
    }
    
}