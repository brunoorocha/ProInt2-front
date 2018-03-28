<?php

class funcionario{
	
	private $cod_funci;
	private $login;
	private $senha;
  private $nome;

	function setCod_funci($cod_funci){
       $this->cod_funci = $cod_funci;     
    }
    
    function getCod_funci(){
       return $this->cod_funci;     
    }
    
    public function setLogin($login){
       $this->login = $login;     
    }

    public function getLogin(){
       return $this->login;     
    }
    
    public function setSenha($senha){
       $this->senha = $senha;     
    }
    
    public function getSenha(){
       return $this->senha;     
    }
    function setNome($nome){
      $this->nome = $nome;
    }
    function getNome(){
      return $this->nome;
    }
    public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_funci = " ";
          $this->login = " ";
          $this->senha = " ";
          $this->nome = " ";

        }
        if($n_args == 4){
          $this->cod_funci = $args[0];
          $this->login = $args[1];
          $this->senha = $args[2];
          $this->nome = $args[3];

        }
    }
}