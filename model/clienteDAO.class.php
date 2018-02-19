<?php

require_once 'cliente.class.php';
include './conexao.php'; 
class clienteDAO{
    private $bd;
    private function conecta{
    	$this->bd = new conexao("localhost", "root", "", "otica");
    	$con = $this->bd->conectar();
	}
    
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
        $this->conecta();
        $q = "INSERT INTO cliente (nome,profissao,endereco,rg,cpf,filiacao,naturalidade,data_nasc,nome_conjuge,profissao_conjuge,referencia,telefone_referencia) VALUES('$nome','$profissao','$endereco','$rg','$cpf','$filiacao','$naturalidade','$data_nasc','$nome_conjuge','$profissao_conjuge','$referencia','$telefone_referencia')";   
        $stmt = $this->bd->query($q);
    }

    function listaTudo(){
        $this->conecta();
        $q = "SELECT * FROM cliente";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $cliente[$i]= new cliente(); 
            $cliente[$i]->setCod_cliente($result[$i]['cod_cliente']);
            $cliente[$i]->setNome($result[$i]['nome']);
            $cliente[$i]->setProfissao($result[$i]['profissao']);
            $cliente[$i]->setEndereco($result[$i]['endereco']);
            $cliente[$i]->setRg($result[$i]['rg']);
            $cliente[$i]->setCpf($result[$i]['cpf']);
            $cliente[$i]->setFiliacao($result[$i]['filiacao']);
            $cliente[$i]->setNaturalidade($result[$i]['naturalidade']);
            $cliente[$i]->setData_nasc($result[$i]['data_nasc']);
            $cliente[$i]->setNome_conjuge($result[$i]['nome_conjuge']);
            $cliente[$i]->setProfissao_conjuge($result[$i]['profissao_conjuge']);
            $cliente[$i]->setReferencia($result[$i]['referencia']);
            $cliente[$i]->setTelefone_referencia($result[$i]['telefone_referencia']);
        }
        
	return $cliente;
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_cliente){
        $this->conecta();
        $q = "SELECT * FROM cliente WHERE cod_cliente = $cod_cliente";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cliente= new cliente(); 
        $cliente->setCod_cliente($result[0]['cod_cliente']);
        $cliente->setNome($result[0]['nome']);
        $cliente->setProfissao($result[0]['profissao']);
        $cliente->setEndereco($result[0]['endereco']);
        $cliente->setRg($result[0]['rg']);
        $cliente->setCpf($result[0]['cpf']);
        $cliente->setFiliacao($result[0]['filiacao']);
        $cliente->setNaturalidade($result[0]['naturalidade']);
        $cliente->setData_nasc($result[0]['data_nasc']);
        $cliente->setNome_conjuge($result[0]['nome_conjuge']);
        $cliente->setProfissao_conjuge($result[0]['profissao_conjuge']);
        $cliente->setReferencia($result[0]['referencia']);
        $cliente->setTelefone_referencia($result[0]['telefone_referencia']);

	return $cliente;
    }
    function editarCliente($cliente){
        $cod_cliente=$cliente->getCod_cliente();
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
        $this->conecta();
        $q = "UPDATE cliente set nome='$nome',profissao='$profissao',endereco='$endereco',rg='$rg',cpf='$cpf',filiacao='$filiacao',naturalidade='$naturalidade',data_nasc='$data_nasc',nome_conjuge='$nome_conjuge',profissao_conjuge='$profissao_conjuge',referencia='$referencia',telefone_referencia='$telefone_referencia'WHERE cod_cliente=$cod_cliente";   
        $stmt = $this->bd->query($q);
    }


    function excluirCliente($cliente){
            $cod_cliente=$cliente->getCod_cliente();
            $this->conecta();
            $q = "DELETE FROM cliente WHERE cod_cliente=$cod_cliente";
            $stmt = $this->bd->query($q);
    }
}