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
	private $cliente_cod;

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
	function setCliente_cod($cliente_cod){
		$this->cliente_cod = $cliente_cod;
	}
	function getCliente_cod(){
		return $this->cliente_cod;
	}
}