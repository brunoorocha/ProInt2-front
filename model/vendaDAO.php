<?php

require_once 'venda.class.php';
require_once 'cliente.class.php';
require_once 'produto.class.php';
include './conexao.php'; 
class vendaDAO{
    private $bd;
    private function conecta{
    	$this->bd = new conexao("localhost", "root", "", "otica");
    	$con = $this->bd->conectar();
	}
    
    function cadastrarVenda($venda,$produto,$cliente){
        $forma_pagamento=$venda->getForma_pagamento();
        $qtd_parcela=$venda->getQtd_parcela();
        $obs=$venda->getObs();
        $cliente_cod=$cliente->getCod_cliente();
        $produto_cod=$produto->getCod_produto();
        
        $this->conecta();
        $q = "INSERT INTO venda (forma_pagamento,qtd_parcela,obs,cliente_cod,produto_cod) VALUES('$forma_pagamento','$qtd_parcela','$obs','$cliente_cod','$produto_cod')";   
        $stmt = $this->bd->query($q);
    }

    function listaTudo(){
        $this->conecta();
        $q = "SELECT * FROM venda";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $venda[$i]= new venda(); 
            $venda[$i]->setCod_venda($result[$i]['cod_venda']);
            $venda[$i]->setForma_pagamento($result[$i]['forma_pagamento']);
            $venda[$i]->setQtd_parcela($result[$i]['qtd_parcela']);
            $venda[$i]->setObs($result[$i]['obs']);
            $venda[$i]->setCliente_cod($result[$i]['cliente_cod']);
            $venda[$i]->setProduto_cod($result[$i]['produto_cod']);
        }
        
	return $venda;
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_venda){
        $this->conecta();
        $q = "SELECT * FROM venda WHERE cod_venda = $cod_venda";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $venda= new venda(); 
        $venda->setCod_venda($result[0]['cod_venda']);
        $venda->setForma_pagamento($result[0]['forma_pagamento']);
        $venda->setQtd_parcela($result[0]['qtd_parcela']);
        $venda->setObs($result[0]['obs']);
        $venda->setCliente_cod($result[0]['cliente_cod']);
        $venda->setProduto_cod($result[0]['produto_cod']);
        
	return $venda;
    }
    function editarVenda($venda){
        $cod_venda=$venda->getCod_venda();
        $forma_pagamento=$venda->getForma_pagamento();
        $qtd_parcela=$venda->getQtd_parcela();
        $obs=$venda->getObs();
        $cliente_cod=$venda->getCliente_cod();
        $produto_cod=$venda->getProduto_cod();

        $this->conecta();
        $q = "UPDATE venda set forma_pagamento='$forma_pagamento',qtd_parcela='$qtd_parcela',obs='$obs',cliente_cod='$cliente_cod',produto_cod='$produto_cod' WHERE cod_venda=$cod_venda";   
        $stmt = $this->bd->query($q);
    }


    function excluirVenda($venda){
            $cod_venda=$venda->getCod_venda();
            $this->conecta();
            $q = "DELETE FROM venda WHERE cod_venda=$cod_venda";
            $stmt = $this->bd->query($q);
    }
}