<?php

 class produtoController{
    
        public function __construct() {            
            require_once 'model/produtoDAO.class.php';            
            require_once 'model/produto.class.php';            
        }
        
        
        function cadastrar($input){
            $produto = new produto();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $produto->setNome($input["nome"]);
                $produto->setPreco_fabrica($input["preco_fabrica"]);
                $produto->setPreco_revenda($input["preco_revenda"]);
                $produto->setFornecedor($input["fornecedor"]);
                
                $produtoDao = new produtoDAO();
                $produtoDao->cadastrarProduto($produto);

                return "OK";
            } 
        }

        function visualizar_todos() {
            $produtoDao = new produtoDAO();
            $result = $produtoDao->retornaProdutos();            
            
            return $result;            
        }

        function visualizar_um($id) {
            $produtoDao = new produtoDAO();
            $result = $produtoDao->listaUm($id);            
            
            return $result;                 
        }
        
        function view_cadastrar(){
          
            $pVIEW = new produtoView();
            $pVIEW->cadastrarProduto();
          
        }

        function alterar($input){            	
            $produto = new produto();            
                                     
            $produto->setNome($input['nome']);
            $produto->setPreco_fabrica($input['preco_fabrica']);
            $produto->setPreco_revenda($input['preco_revenda']);
            $produto->setFornecedor($input['fornecedor']);
            $produto->setCod_produto($input['cod_produto']);

            $pDAO = new produtoDAO();
            $pDAO->atualizarProduto($produto);
            return "Ok";
        }
		
        function View_Alterar(){
            $pDAO = new produtoDAO();
            $lista = $pDAO->listaTudo();
            $_REQUEST['lista']=$lista;
			
            $pVIEW = new produtoView();
            $pVIEW->editarProduto();
        }
		
        function excluir($id){			            
            $pDAO = new produtoDAO();
            $pDAO->excluirProduto($id);
            echo "OK";
        }
		
	function View_Excluir(){
            $pVIEW = new produtoView();
            $pVIEW->excluirProduto();
	}
            
    }       
        

