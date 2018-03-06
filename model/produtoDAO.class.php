
<?php

require_once 'produto.class.php';
require_once './conexao.php'; 
class produtoDAO{
    
    
    function cadastrarProduto($produto){
        $nome=$produto->getNome();
        $preco_fabrica=$produto->getPreco_fabrica();
        $preco_revenda=$produto->getPreco_revenda();
        $fornecedor=$produto->getFornecedor();
        
        
        $q = "INSERT INTO produto (nome,preco_fabrica,preco_revenda,fornecedor) VALUES('$nome','$preco_fabrica','$preco_revenda','$fornecedor')";   
        $conexao = conexao::connect();        
        $stmt = $conexao->query($q);
    }

    function retornaProdutos(){
        $conexao = conexao::connect();        
        $stmt = $conexao->query("SELECT * FROM produto");        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $produtos = array();
        
        if($stmt->rowCount() == 0) {            
            return NULL;
        }

        for($i=0; $i<$stmt->rowCount(); $i++){
            $produto = array(); 
            $produto["cod_produto"] = $result[$i]['cod_produto'];
            $produto["nome"] = $result[$i]['nome'];
            $produto["preco_fabrica"] = $result[$i]['preco_fabrica'];            
            $produto["preco_revenda"] = $result[$i]['preco_revenda'];
            $produto["fornecedor"] = $result[$i]['fornecedor'];            
            
            array_push($produtos, $produto);
        }
        
	    return json_encode($produtos);
	}

    // Função que retorna as informações de 1 produto passando como parâmetro o seu código
        
    function listaUm($cod_produto){
        $this->conecta();
        $q = "SELECT * FROM produto WHERE cod_produto = $cod_produto";
        $conex = new conexao("localhost", "root", "", "otica");
        $PDO = $conex->conecta();
        $stmt = $PDO->query($q);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produto= new produto(); 
        $produto->setCod_produto($result[0]['cod_produto']);
        $produto->setNome($result[0]['nome']);
        $produto->setPreco_fabrica($result[0]['preco_fabrica']);
        $produto->setPreco_revenda($result[0]['preco_revenda']);
        $produto->setFornecedor($result[0]['fornecedor']);
        

	return $produto;
    }
    function atualizarProduto($produto){
        $nome=$produto->getNome();
        $preco_fabrica=$produto->getPreco_fabrica();
        $preco_revenda=$produto->getPreco_revenda();
        $fornecedor=$produto->getFornecedor();
        $cod_produto = $produto->getCod_produto();
        
        $q = "UPDATE produto set nome='$nome',preco_fabrica='$preco_fabrica',preco_revenda='$preco_revenda',fornecedor='$fornecedor' WHERE cod_produto=$cod_produto";   
        $conex = new conexao("localhost", "root", "", "otica");
        $PDO = $conex->conecta();
        $stmt = $PDO->query($q);
    }

    function excluirProduto($produto){
            $cod_produto=$produto->getCod_produto();
            
            $conex = new conexao("localhost", "root", "", "otica");
            $PDO = $conex->conecta();
            $stmt = $PDO->query("DELETE FROM produto WHERE cod_produto=$cod_produto");
    }
}