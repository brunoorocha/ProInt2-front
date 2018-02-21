
<?php

require_once 'produto.class.php';
include './conexao.php'; 
class clienteDAO{
    private $bd;
    private function conecta{
    	$this->bd = new conexao("localhost", "root", "", "otica");
    	$con = $this->bd->conectar();
	}
    
    function cadastrarProduto($produto){
        $nome=$produto->getNome();
        $preco_fabrica=$produo->getPreco_fabrica();
        $preco_revenda=$produto->getPreco_revenda();
        $fornecedor=$produto->getFornecedor();
        
        $this->conecta();
        $q = "INSERT INTO produto (nome,preco_fabrica,preco_revenda,fornecedor) VALUES('$nome','$preco_fabrica','$preco_revenda','$fornecedor')";   
        $stmt = $this->bd->query($q);
    }

    function listaTudo(){
        $this->conecta();
        $q = "SELECT * FROM produto";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
        for($i=0; $i<$stmt->rowCount(); $i++){
            $produto[$i]= new produto(); 
            $produto[$i]->setCod_produto($result[$i]['cod_produto']);
            $produto[$i]->setNome($result[$i]['nome']);
            $produto[$i]->setPreco_fabrica($result[$i]['preco_fabrica']);
            $produto[$i]->setPreco_revenda($result[$i]['preco_revenda']);
            $produto[$i]->setFornecedor($result[$i]['fornecedor']);
            
        }
        
	return $produto;
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_produto){
        $this->conecta();
        $q = "SELECT * FROM produto WHERE cod_produto = $cod_produto";
        $stmt = $this->bd->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produto= new produto(); 
        $produto->setCod_produto($result[0]['cod_produto']);
        $produto->setNome($result[0]['nome']);
        $produto->setPreco_fabrica($result[0]['preco_fabrica']);
        $produto->setPreco_revenda($result[0]['preco_revenda']);
        $produto->setFornecedor($result[0]['fornecedor']);
        

	return $produto;
    }
    function editarProduto($produto){
        $nome=$produto->getNome();
        $preco_fabrica=$produo->getPreco_fabrica();
        $preco_revenda=$produto->getPreco_revenda();
        $fornecedor=$produto->getFornecedor();

        $this->conecta();
        $q = "UPDATE produto set nome='$nome',preco_fabrica='$preco_fabrica',preco_revenda='$preco_revenda',fornecedor='$fornecedor' WHERE cod_produto=$cod_produto";   
        $stmt = $this->bd->query($q);
    }


    function excluirProduto($produto){
            $cod_produto=$produto->getCod_produto();
            $this->conecta();
            $q = "DELETE FROM produto WHERE cod_produto=$cod_produto";
            $stmt = $this->bd->query($q);
    }
}