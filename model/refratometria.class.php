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

	function SetCod_refrato($cod_refrato){
		this->cod_refrato = $cod_refrato;
	}
	function GetCod_conjuge(){
		return this->cod_refrato;
	}
	function SetOdesf($odesf){
		this->odesf = $odesf;
	}
	function GetOdesf(){
		return this->odesf;
	}
	function SetOdcil($odcil){
		this->odcil = $odcil;
	}
	function GetOdcil(){
		return this->odcil;
	}
	function SetOdeixo($odeixo){
		this->odeixo = $odeixo;
	}
	function GetOdeixo(){
		return this->odeixo;
	}
	function SetOddmp($oddmp){
		this->oddmp = $oddmp;
	}
	function GetOddmp(){
		return this->oddmp;
	}
	function SetOeesf($oeesf){
		this->oeesf = $oeesf;
	}
	function GetOeesf(){
		return this->oeesf;
	}
	function SetOecil($oecil){
		this->oecil = $oecil;
	}
	function GetOecil(){
		return this->oecil;
	}
	function SetOeeixo($oeeixo){
		this->oeeixo = $oeeixo;
	}
	function GetOeeixo(){
		return this->oeeixo;
	}
	function SetOedmp($oedmp){
		this->oedmp = $oedmp;
	}
	function GetOedmp(){
		return this->oedmp;
	}
	function SetCliente_cod($cliente_cod){
		this->cliente_cod = $cliente_cod;
	}
	function GetCliente_cod(){
		return this->cliente_cod;
	}
}