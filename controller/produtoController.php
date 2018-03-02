<?php

 class produtoController{
    
        public function __construct() {
            
            require_once 'model/produtoDAO.class.php';
            require_once 'view/produtoView.php';
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
        
        function view_cadastrar(){
          
            $pVIEW = new produtoView();
            $pVIEW->cadastrarProduto();
          
        }

        function alterar(){
            $pDAO = new produtoDAO();
            $lista = $pDAO->listaTudo();		
            $produto = new produto();
            $pVIEW = new produtoView();
            
             if($_SERVER['REQUEST_METHOD']=='POST'){

                if(isset($_POST['cod_produto'])){
                    $cod_produto = $_POST['cod_produto'];
                    $produto = $pDAO->listaUm($cod_produto);
                    $_REQUEST['produto']=$produto;
                    $_REQUEST['lista']=$lista;
                    $pVIEW->editarProduto();
                }
                if(isset($_POST['cod_produto']) && $_POST['cod_produto']!= NULL){
                    $produto->setNome($_POST['nome']);
                	$produto->setPreco_fabrica($_POST['preco_fabrica']);
                	$produto->setPreco_revenda($_POST['preco_revenda']);
                	$produto->setFornecedor($_POST['fornecedor']);
                    $produto->setCod_produto($_POST['cod_produto']);

                    $pDAO->editarProduto($produto);
                    $pVIEW->redirecionar("View_Alterar", "MODIFICAÇÃO BEM SUCEDIDA !!");
                }
            }
        }
		
        function View_Alterar(){
            $pDAO = new produtoDAO();
            $lista = $pDAO->listaTudo();
            $_REQUEST['lista']=$lista;
			
            $pVIEW = new produtoView();
            $pVIEW->editarProduto();
        }
		
        function excluir(){
			
            $produto = new produto();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $produto->setCod_produto($_POST['cod_produto']);
                $pDAO = new produtoDAO();
                $pDAO->excluirProduto($produto);
                echo "OK";
            }
        }
		
	function View_Excluir(){
            $pVIEW = new produtoView();
            $pVIEW->excluirProduto();
	}
            
    }       
        

