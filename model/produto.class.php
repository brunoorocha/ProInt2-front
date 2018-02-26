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

     function getPreco_revenda(){
       return $this->preco_revenda;     
    }

    function setFornecedor($fornecedor){
       $this->fornecedor = $fornecedor;     
    }

     function getFornecedor(){
       return $this->fornecedor;     
    }


    public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_produto = " ";
          $this->nome = " ";
          $this->preco_fabrica = " ";
          $this->preco_revenda = " ";
          $this->fornecedor = " ";
          

        }
        if($n_args == 8){
          $this->cod_produto = $args[0];
          $this->nome = $args[1];
          $this->preco_fabrica = $args[2];
          $this->preco_revenda = $args[3];
          $this->fornecedor = $args[4];
          
        }
    }


}