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
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }

    function retornaVendas(){
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM venda");        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $vendas = array();

        if($stmt->rowCount() == 0) {            
            return NULL;
        }
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $venda = array();
            $venda["cod_venda"]=$result[$i]['cod_venda'];
            $venda["forma_pagamento"]=$result[$i]['forma_pagamento'];
            $venda["qtd_parcela"]=$result[$i]['qtd_parcela'];
            $venda["obs"]=$result[$i]['obs'];
            $venda["cliente_cod"]=$result[$i]['cliente_cod'];
            $venda["produto_cod"]=$result[$i]['produto_cod'];
            $venda["data"]=$result[$i]['data'];

            array_push($vendas, $venda);
        }

        
	return json_encode($vendas);
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_venda){
        
    
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM venda WHERE cod_venda = $cod_venda"); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        if($stmt->rowCount() == 0) {            
            return NULL;
        }
        
        
            $venda = array();
            $venda["cod_venda"]=$result[$i]['cod_venda'];
            $venda["forma_pagamento"]=$result[$i]['forma_pagamento'];
            $venda["qtd_parcela"]=$result[$i]['qtd_parcela'];
            $venda["obs"]=$result[$i]['obs'];
            $venda["cliente_cod"]=$result[$i]['cliente_cod'];
            $venda["produto_cod"]=$result[$i]['produto_cod'];
            $venda["data"]=$result[$i]['data'];    
            return json_encode($venda);
	
    }
    function editarVenda($venda){
        $cod_venda=$venda->getCod_venda();
        $forma_pagamento=$venda->getForma_pagamento();
        $qtd_parcela=$venda->getQtd_parcela();
        $obs=$venda->getObs();
        $cliente_cod=$venda->cliente->getCod_cliente();
        $produto_cod=$venda->produto->getCod_produto();

        
        $q = "UPDATE venda set forma_pagamento='$forma_pagamento',qtd_parcela='$qtd_parcela',obs='$obs',cliente_cod='$cliente_cod',produto_cod='$produto_cod' WHERE cod_venda=$cod_venda";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }


    function excluirVenda($cod_venda){
        $conexao = conexao::connect();
        $stmt = $conex->query("DELETE FROM venda WHERE cod_venda=$cod_venda");
    }
}