<?php

class funcionario{
	
	private cod_funci;
	private login;
	private senha;

	function setCod_funci($cod_funci){
       $this->cod_funci = $cod_funci;     
    }
     function getCod_funci(){
       return $this->cod_funci;     
    }
    function setLogin($login){
       $this->login = $login;     
    }
     function getLogin(){
       return $this->login;     
    }
    function setSenha($senha){
       $this->senha = $senha;     
    }
     function getSenha(){
       return $this->senha;     
    }
}