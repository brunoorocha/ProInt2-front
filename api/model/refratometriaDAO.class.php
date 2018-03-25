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
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }

    function retornaRefratometrias($cliente_cod){
        
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM refratometria WHERE cliente_cod=$cliente_cod");        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0) {            
            return NULL;
        }

		$refratometrias = array();

        for($i=0; $i<$stmt->rowCount(); $i++){
            
            $refratometria= array(); 
            $refratometria['cod_refrato']=$result[$i]['cod_refrato'];
            $refratometria['odesf']=$result[$i]['odesf'];
            $refratometria['odcil']=$result[$i]['odcil'];
            $refratometria['odeixo']=$result[$i]['odeixo'];
            $refratometria['oddmp']=$result[$i]['oddmp'];
            $refratometria['oeesf']=$result[$i]['oeesf'];
            $refratometria['oecil']=$result[$i]['oecil'];
            $refratometria['oeeixo']=$result[$i]['oeeixo'];
            $refratometria['oedmp']=$result[$i]['oedmp'];
            $refratometria['cliente_cod']=$result[$i]['cliente_cod'];
            
            array_push($refratometrias, $refratometria);
        }
        
	   return json_encode($refratometrias);
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_cliente,$cod_refrato){
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM refratometria WHERE cliente_cod=$cliente_cod AND cod_refrato = $cod_refrato");        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0) {            
            return NULL;
        }
            
        $refratometria= array(); 
        $refratometria['cod_refrato']=$result[0]['cod_refrato'];
        $refratometria['odesf']=$result[0]['odesf'];
        $refratometria['odcil']=$result[0]['odcil'];
        $refratometria['odeixo']=$result[0]['odeixo'];
        $refratometria['oddmp']=$result[0]['oddmp'];
        $refratometria['oeesf']=$result[0]['oeesf'];
        $refratometria['oecil']=$result[0]['oecil'];
        $refratometria['oeeixo']=$result[0]['oeeixo'];
        $refratometria['oedmp']=$result[0]['oedmp'];
        $refratometria['cliente_cod']=$result[0]['cliente_cod'];
            
        
       return json_encode($refratometria);
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
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }


    function excluirRefratometria($refratometria){
        $cod_refrato=$refrato->getCod_refrato();
            
        $conex = conexao::connect();                
        $stmt = $conex->query("DELETE FROM refrato WHERE cod_refrato=$cod_refrato");
    }
}