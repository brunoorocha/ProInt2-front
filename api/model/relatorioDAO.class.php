<?php

require_once 'venda.class.php';
require_once 'relatorio.class.php';

class relatorioDAO{
    
    function cadastrarRel($rel){
        
        $saldo=$rel->getSaldo(); 
        $entrada=$rel->getEntrada();
        $saida=$rel->getSaida();
        $venda=$rel->getVenda();
          
        
        $q = "INSERT INTO venda (saldo,entrada,saida,venda) VALUES('$saldo','$entrada','$saida','$venda')";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }

    function retornaRel(){
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM relatorio");        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $rel = array();

        if($stmt->rowCount() == 0) {            
            return NULL;
        }
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            
            $rel["saldo"] = $result[$i]['saldo'];
            $rel["entrada"] = $result[$i]['entrada'];
            $rel["saida"] = $result[$i]['saida'];
        
        }
        
    	return json_encode($rel);
	}



}