<?php

require_once 'refratometria.class.php';
require_once 'cliente.class.php';
require_once './conexao.php'; 
class refratometriaDAO{
    
    
    function cadastrarRefratometria($refratometria){
        $odesf=$refratometria->getOdesf();
        $odcil=$refratometria->getOdcil();
        $odeixo=$refratometria->getOdeixo();
        $oddmp=$refratometria->getOddmp();
        $oeesf=$refratometria->getOeesf();
        $oecil=$refratometria->getOecil();
        $oeeixo=$refratometria->getOeeixo();
        $oedmp=$refratometria->getOedmp();
        $cliente_cod = $refratometria->cliente->getCliente_cod();
        
        $q = "INSERT INTO refratometria (odesf,odcil,odeixo,oddmp,oeesf,oecil,oeeixo,oedmp,cliente_cod) VALUES('$odesf','$odcil','$odeixo','$oddmp','$oeesf','$oecil','$oeeixo','$oedmp','$cliente_cod')";   
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }

    function listaTudo(){
        
        $q = "SELECT * FROM refratometria";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $refratometria[$i]= new refratometria(); 
            $refratometria[$i]->setCod_refrato($result[$i]['cod_refrato']);
            $refratometria[$i]->setOdesf($result[$i]['odesf']);
            $refratometria[$i]->setOdcil($result[$i]['odcil']);
            $refratometria[$i]->setOdeixo($result[$i]['odeixo']);
            $refratometria[$i]->setOddmp($result[$i]['oddmp']);
            $refratometria[$i]->setOeesf($result[$i]['oeesf']);
            $refratometria[$i]->setOecil($result[$i]['oecil']);
            $refratometria[$i]->setOeeixo($result[$i]['oeeixo']);
            $refratometria[$i]->setOedmp($result[$i]['oedmp']);
            $refratometria[$i]->cliente->setCod_cliente($result[$i]['cliente_cod']);
        }
        
	return $refratometria;
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_refrato){
        
        $q = "SELECT * FROM refratometria WHERE cod_refrato = $cod_refrato";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $refratometria= new refratometria(); 
        $refratometria->setCod_refrato($result[0]['cod_refrato']);
        $refratometria->setOdesf($result[0]['odesf']);
        $refratometria->setOdcil($result[0]['odcil']);
        $refratometria->setOdeixo($result[0]['odeixo']);
        $refratometria->setOddmp($result[0]['oddmp']);
        $refratometria->setOeesf($result[0]['oeesf']);
        $refratometria->setOecil($result[0]['oecil']);
        $refratometria->setOeeixo($result[0]['oeeixo']);
        $refratometria->setOedmp($result[0]['oedmp']);
        $refratometria->setCliente_cod($result[0]['cliente_cod']);
	return $refratometria;
    }
    function editarRefratometria($refratometria){
        $cod_refrato=$refratometria->getCod_refrato();
        $odesf=$refratometria->getOdesf();
        $odcil=$refratometria->getOdcil();
        $odeixo=$refratometria->getOdeixo();
        $oddmp=$refratometria->getOddmp();
        $oeesf=$refratometria->getOeesf();
        $oecil=$refratometria->getOecil();
        $oeeixo=$refratometria->getOeeixo();
        $oedmp=$refratometria->getOedmp();
        $cliente_cod=$refratometria->cliente->getCod_cliente();
        
        $q = "UPDATE refratometria set odesf='$odesf',odcil='$odcil',odeixo='$odeixo',oddmp='$oddmp',oeesf='$oeesf',oecil='$oecil',oeeixo='$oeeixo',oedmp='$oedmp',cliente_cod='$cliente_cod' WHERE cod_refrato=$cod_refrato";   
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }


    function excluirRefratometria($refratometria){
        $cod_refrato=$refrato->getCod_refrato();
            
        $q = "DELETE FROM refrato WHERE cod_refrato=$cod_refrato";
        $conex = new conexao("localhost", $MYSQL_USER, $MYSQL_PASS, "otica");
        $pdo = $conex->conecta();
        $stmt = $pdo->query($q);
    }
}