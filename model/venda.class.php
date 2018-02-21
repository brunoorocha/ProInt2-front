<?php

class venda{
	private $cod_venda;
	private $forma_pagamento; 
	private $qtd_parcela;
	private $obs;
	private $cliente_cod;
	private $produto_cod;
	

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
	function setCliente_cod($cliente_cod){
		$this->cliente_cod = $cliente_cod;
	}
	function getCliente_cod(){
		return $this->cliente_cod;
	}
	function setProduto_cod($produto_cod){
		$this->produto_cod = $produto_cod;
	}
	function getProduto_cod(){
		return $this->produto_cod;
	}
}