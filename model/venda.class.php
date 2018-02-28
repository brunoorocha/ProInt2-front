<?php

class venda{
	private $cod_venda;
	private $forma_pagamento; 
	private $qtd_parcela;
	private $obs;
	private $data;
	private $cliente;
	private $produto;

	public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_venda = " ";
          $this->forma_pagamento = " ";
          $this->qtd_parcela = " ";
          $this->obs = " ";
          $this->data = " ";
          $this->cliente = " ";
          $this->produto = " ";

        }
        if($n_args == 13){
          $this->cod_venda = $args[0];
          $this->forma_pagamento = $args[1];
          $this->qtd_parcela = $args[2];
          $this->obs = $args[3];
          $this->data = $args[4];
          $this->cliente = $args[5];
          $this->produto = $args[6];
          
        }
    }

	function setCod_venda($cod_venda){
		$this->cod_venda = $cod_venda;
	}
	function getCod_venda(){
		return $this->cod_venda;
	}
	function setForma_pagamento($forma_pagamento){
		$this->forma_pagamento = $forma_pagamento;
	}
	function getForma_pagamento(){
		return $this->forma_pagamento;
	}
	function setQtd_parcela($qtd_parcela){
		$this->qtd_parcela = $qtd_parcela;
	}
	function getQtd_parcela(){
		return $this->qtd_parcela;
	}
	function setObs($obs){
		$this->obs = $obs;
	}
	function getObs(){
		return $this->obs;
	}
	function setCliente($cliente){
		$this->cliente = $cliente;
	}
	function getCliente(){
		return $this->cliente;
	}
	function setProduto($produto){
		$this->produto = $produto;
	}
	function getProduto(){
		return $this->produto;
	}
	function setData($data){
		$this->data = $data;
	}
	function getData(){
		return $this->data;
	}
}