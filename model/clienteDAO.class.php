<?php

require_once 'cliente.class.php';
require_once './conexao.php'; 
class clienteDAO{
    
    
    function cadastrarCliente($cliente){
        $nome=$cliente->getNome();
        $profissao=$cliente->getProfissao();
        $endereco=$cliente->getEndereco();
        $rg=$cliente->getRg();
        $cpf=$cliente->getCpf();
        $filiacao=$cliente->getFiliacao();
        $naturalidade=$cliente->getNaturalidade();
        $data_nasc=$cliente->getData_nasc();
        $nome_conjuge=$cliente->getNome_conjuge();
        $profissao_conjuge=$cliente->getProfissao_conjuge();
        $referencia=$cliente->getReferencia();
        $telefone_referencia=$cliente->getTelefone_referencia();
       
        $q = "INSERT INTO cliente (nome,profissao,endereco,rg,cpf,filiacao,naturalidade,data_nasc,nome_conjuge,profissao_conjuge,referencia,telefone_referencia) VALUES('$nome','$profissao','$endereco','$rg','$cpf','$filiacao','$naturalidade','$data_nasc','$nome_conjuge','$profissao_conjuge','$referencia','$telefone_referencia')";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);        
    }

    function retornaClientes(){
        
        $q = "SELECT * FROM cliente";
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() == 0) {            
            return NULL;
        }

        $clientes = array();

        for($i=0; $i<$stmt->rowCount(); $i++){
            $cliente = array();            
            $cliente["cod_cliente"] = $result[$i]['cod_cliente'];
            $cliente["nome"] = $result[$i]['nome'];
            $cliente["profissao"] = $result[$i]['profissao'];
            $cliente["endereco"] = $result[$i]['endereco'];
            $cliente["rg"] = $result[$i]['rg'];
            $cliente["cpf"] = $result[$i]['cpf'];
            $cliente["filiacao"] = $result[$i]['filiacao'];
            $cliente["naturalidade"] = $result[$i]['naturalidade'];
            $cliente["data_nasc"] = $result[$i]['data_nasc'];
            $cliente["nome_conjuge"] = $result[$i]['nome_conjuge'];
            $cliente["profissao_conjuge"] = $result[$i]['profissao_conjuge'];
            $cliente["referencia"] = $result[$i]['referencia'];
            $cliente["telefone_referencia"] = $result[$i]['telefone_referencia'];

            array_push($clientes, $cliente);
        }
        
	    return json_encode($clientes);
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function retornaUm($cod_cliente){
        
        $q = "SELECT * FROM cliente WHERE cod_cliente = $cod_cliente";
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 0) {            
            return NULL;
        }

        $cliente = array(); 
        $cliente["cod_cliente"] = $result[0]['cod_cliente'];
        $cliente["nome"] = $result[0]['nome'];
        $cliente["profissao"] = $result[0]['profissao'];
        $cliente["endereco"] = $result[0]['endereco'];
        $cliente["rg"] = $result[0]['rg'];
        $cliente["cpf"] = $result[0]['cpf'];
        $cliente["filiacao"] = $result[0]['filiacao'];
        $cliente["naturalidade"] = $result[0]['naturalidade'];
        $cliente["data_nasc"] = $result[0]['data_nasc'];
        $cliente["nome_conjuge"] = $result[0]['nome_conjuge'];
        $cliente["profissao_conjuge"] = $result[0]['profissao_conjuge'];
        $cliente["referencia"] = $result[0]['referencia'];
        $cliente["telefone_referencia"] = $result[0]['telefone_referencia'];

	    return json_encode($cliente);
    }

    function atualizarCliente($cliente){
        $cod_cliente = $cliente->getCod_cliente();
        $nome = $cliente->getNome();
        $profissao = $cliente->getProfissao();
        $endereco = $cliente->getEndereco();
        $rg = $cliente->getRg();
        $cpf = $cliente->getCpf();
        $filiacao = $cliente->getFiliacao();
        $naturalidade = $cliente->getNaturalidade();
        $data_nasc = $cliente->getData_nasc();
        $nome_conjuge = $cliente->getNome_conjuge();
        $profissao_conjuge = $cliente->getProfissao_conjuge();
        $referencia = $cliente->getReferencia();
        $telefone_referencia = $cliente->getTelefone_referencia();
        
        $q = "UPDATE cliente set nome='$nome',profissao='$profissao',endereco='$endereco',rg='$rg',cpf='$cpf',filiacao='$filiacao',naturalidade='$naturalidade',data_nasc='$data_nasc',nome_conjuge='$nome_conjuge',profissao_conjuge='$profissao_conjuge',referencia='$referencia',telefone_referencia='$telefone_referencia' WHERE cod_cliente=$cod_cliente";   
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }


    function excluirCliente($cod_cliente){                        
        $q = "DELETE FROM cliente WHERE cod_cliente=$cod_cliente";
        $conex = conexao::connect();        
        $stmt = $conex->query($q);
    }
}