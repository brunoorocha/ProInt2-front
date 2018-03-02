<?php

require_once 'venda.class.php';
require_once 'cliente.class.php';
require_once 'produto.class.php';
include './conexao.php'; 
class vendaDAO{
    
    function cadastrarVenda($venda){
        $forma_pagamento=$venda->getForma_pagamento();
        $qtd_parcela=$venda->getQtd_parcela();
        $obs=$venda->getObs();
        $cliente_cod=$venda->cliente->getCod_cliente();
        $produto_cod=$venda->produto->getCod_produto();
        $data=$venda->getData();
        
        
        $q = "INSERT INTO venda (forma_pagamento,qtd_parcela,obs,cliente_cod,produto_cod, data) VALUES('$forma_pagamento','$qtd_parcela','$obs','$cliente_cod','$produto_cod','$data')";   
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }

    function listaTudo(){
        
        $q = "SELECT * FROM venda";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $venda[$i]= new venda(); 
            $venda[$i]->setCod_venda($result[$i]['cod_venda']);
            $venda[$i]->setForma_pagamento($result[$i]['forma_pagamento']);
            $venda[$i]->setQtd_parcela($result[$i]['qtd_parcela']);
            $venda[$i]->setObs($result[$i]['obs']);
            $venda[$i]->cliente->setCod_cliente($result[$i]['cliente_cod']);
            $venda[$i]->produto->setCod_produto($result[$i]['produto_cod']);
            $venda[$i]->setData($result[$i]['data']);
        }
        
	return $venda;
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_venda){
        
        $q = "SELECT * FROM venda WHERE cod_venda = $cod_venda";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $venda= new venda(); 
        $venda->setCod_venda($result[0]['cod_venda']);
        $venda->setForma_pagamento($result[0]['forma_pagamento']);
        $venda->setQtd_parcela($result[0]['qtd_parcela']);
        $venda->setObs($result[0]['obs']);
        $venda->cliente->setCod_cliente($result[0]['cliente_cod']);
        $venda->produto->setCod_produto($result[0]['produto_cod']);
        $venda->setData($result[0]['data']);

	return $venda;
    }
    function editarVenda($venda){
        $cod_venda=$venda->getCod_venda();
        $forma_pagamento=$venda->getForma_pagamento();
        $qtd_parcela=$venda->getQtd_parcela();
        $obs=$venda->getObs();
        $cliente_cod=$venda->cliente->getCod_cliente();
        $produto_cod=$venda->produto->getCod_produto();

        $this->conecta();
        $q = "UPDATE venda set forma_pagamento='$forma_pagamento',qtd_parcela='$qtd_parcela',obs='$obs',cliente_cod='$cliente_cod',produto_cod='$produto_cod' WHERE cod_venda=$cod_venda";   
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }


    function excluirVenda($venda){
        $cod_venda=$venda->getCod_venda();
        $this->conecta();
        $q = "DELETE FROM venda WHERE cod_venda=$cod_venda";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }
}