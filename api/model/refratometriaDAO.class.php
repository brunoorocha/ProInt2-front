<?php

require_once 'refratometria.class.php';
require_once 'cliente.class.php';
require_once './conexao.php'; 
class refratometriaDAO{
    
    
    function cadastrarRefratometria($refratometria){
        
        $odesf = floatval(str_replace(',', '.', $refratometria->getOdesf()));
        $odcil = floatval(str_replace(',', '.', $refratometria->getOdcil()));
        $odeixo = floatval(str_replace(',', '.', $refratometria->getOdeixo()));
        $oddmp = floatval(str_replace(',', '.', $refratometria->getOddmp()));
        $oeesf = floatval(str_replace(',', '.', $refratometria->getOeesf()));
        $oecil = floatval(str_replace(',', '.', $refratometria->getOecil()));
        $oeeixo = floatval(str_replace(',', '.', $refratometria->getOeeixo()));
        $oedmp = floatval(str_replace(',', '.', $refratometria->getOedmp()));
        $cliente_cod = $refratometria->getCodCliente();
        $data = $refratometria->getData();
        
        $q = "INSERT INTO refratometria (odesf,odcil,odeixo,oddmp,oeesf,oecil,oeeixo,oedmp,cliente_cod, data) VALUES('$odesf','$odcil','$odeixo','$oddmp','$oeesf','$oecil','$oeeixo','$oedmp','$cliente_cod', '$data')";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }

    function retornaRefratometrias($cliente_cod){
        
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM refratometria WHERE cliente_cod=$cliente_cod ORDER BY data DESC");        
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
            $refratometria['data']=$result[$i]['data'];
            
            array_push($refratometrias, $refratometria);
        }
        
	   return json_encode($refratometrias);
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_cliente){
        
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM refratometria WHERE cliente_cod=$cod_cliente");        
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

        $time = strtotime($result[0]['data']);      
        $refratometria['data'] = date("Y-m-d H:i:s", $time);
        
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
        $cliente_cod=$refratometria->getCodCliente();
        $data=$refratometria->getData();        
        
        $q = "UPDATE refratometria set odesf='$odesf',odcil='$odcil',odeixo='$odeixo',oddmp='$oddmp',oeesf='$oeesf',oecil='$oecil',oeeixo='$oeeixo',oedmp='$oedmp',cliente_cod='$cliente_cod', data='$data' WHERE cod_refrato=$cod_refrato";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }


    function excluirRefratometria($refratometria){
        $cod_refrato=$refrato->getCod_refrato();
            
        $conex = conexao::connect();                
        $stmt = $conex->query("DELETE FROM refrato WHERE cod_refrato=$cod_refrato");
    }
}