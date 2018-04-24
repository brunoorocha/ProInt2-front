<?php

class relatorio{
	private $cod_rel;
	private $saldo; 
	private $entrada;
	private $saida;
	private $venda;
	

	public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_rel = " ";
          $this->saldo = " ";
          $this->entrada = " ";
          $this->saida = " ";
          $this->venda = " ";
        }
        if($n_args == 6){
          $this->cod_rel = $args[0];
          $this->saldo = $args[1];
          $this->entrada = $args[2];
          $this->saida = $args[3];
          $this->venda = $args[4];
         
        }
    }

	function setCod_rel($cod_rel){
		$this->cod_rel = $cod_rel;
	}
	function getCod_rel(){
		return $this->cod_rel;
	}
	function setSaldo($saldo){
		$this->saldo = $this->getEntrada()-$this->getSaida();
	}
	function getSaldo(){
		return $this->saldo;
	}
	function setEntrada($enntrada){
		$this->entrada = $entrada;
	}
	function getEntrada(){
		return $this->entrada;
	}
	function setSaida($saida){
		$this->saida = $saida;
	}
	function getSaida(){
		return $this->saida;
	}
	function setVenda($venda){
		$this->venda = $venda;
	}
	function getVenda(){
		return $this->venda;
	}
	
}