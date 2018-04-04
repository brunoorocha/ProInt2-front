<?php

class refratometria{
	private $cod_refrato;
	private $odesf; 
	private $odcil;
	private $odeixo;
	private $oddmp;
	private $oeesf;
	private $oecil;
	private $oeeixo;
	private $oedmp;
	private $cod_cliente;
	private $data;

	public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_refrato = " ";
          $this->odesf = " ";
          $this->odcil = " ";
          $this->odeixo = " ";
          $this->oddmp = " ";
          $this->oeesf = " ";
          $this->oecil = " ";
          $this->oeeixo = " ";
          $this->oedmp = " ";
          $this->cliente_cod = " ";


        }
        if($n_args == 13){
          $this->cod_refrato = $args[0];
          $this->odesf = $args[1];
          $this->odcil = $args[2];
          $this->odeixo = $args[3];
          $this->oddmp = $args[4];
          $this->cpf = $args[5];
          $this->oeesf = $args[6];
          $this->oecil = $args[7];
          $this->oeeixo = $args[8];
          $this->oedmp = $args[9];
          $this->cliente = $args[10];
          
        }
    }

	function setCod_refrato($cod_refrato){
		$this->cod_refrato = $cod_refrato;
	}
	function getCod_refrato(){
		return $this->cod_refrato;
	}
	function setOdesf($odesf){
		$this->odesf = $odesf;
	}
	function getOdesf(){
		return $this->odesf;
	}
	function setOdcil($odcil){
		$this->odcil = $odcil;
	}
	function getOdcil(){
		return $this->odcil;
	}
	function setOdeixo($odeixo){
		$this->odeixo = $odeixo;
	}
	function getOdeixo(){
		return $this->odeixo;
	}
	function setOddmp($oddmp){
		$this->oddmp = $oddmp;
	}
	function getOddmp(){
		return $this->oddmp;
	}
	function setOeesf($oeesf){
		$this->oeesf = $oeesf;
	}
	function getOeesf(){
		return $this->oeesf;
	}
	function setOecil($oecil){
		$this->oecil = $oecil;
	}
	function getOecil(){
		return $this->oecil;
	}
	function setOeeixo($oeeixo){
		$this->oeeixo = $oeeixo;
	}
	function getOeeixo(){
		return $this->oeeixo;
	}
	function setOedmp($oedmp){
		$this->oedmp = $oedmp;
	}
	function getOedmp(){
		return $this->oedmp;
	}
	function setCodCliente($cod_cliente){
		$this->cod_cliente = $cod_cliente;
	}
	function getCodCliente(){
		return $this->cod_cliente;
	}

	function setData($data){
		$this->data = $data;
	}
	function getData(){
		return $this->data;
	}
}