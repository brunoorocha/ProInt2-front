<?php

class produto{
	private $cod_produto;
	private $nome;
	private $preco_fabrica;
	private $preco_revenda;
	private $fornecedor;

	function setNome($nome){
       $this->nome = $nome;     
    }

     function getNome(){
       return $this->nome;     
    }
    function setCod_produto($cod_produto){
       $this->cod_produto = $cod_produto;     
    }

     function getCod_produto(){
       return $this->cod_produto;     
    }
    function setPreco_fabrica($preco_fabrica){
       $this->preco_fabrica = $preco_fabrica;     
    }

     function getPreco_fabrica(){
       return $this->preco_fabrica;     
    }
    function setPreco_revenda($preco_revenda){
       $this->preco_revenda = $preco_revenda;     
    }

     function getPreco_fabrica(){
       return $this->preco_revenda;     
    }

    function setFornecedor($fornecedor){
       $this->fornecedor = $fornecedor;     
    }

     function getFornecedor(){
       return $this->fornecedor;     
    }
}