<?php
    
    class vendaController{
    
        public function __construct() {
            
            require_once 'model/vendaDAO.php';            
            require_once 'model/venda.class.php';
            require_once 'model/cliente.class.php';
            
        }
        
        function visualizar_todos() {
            $vDAO = new vendaDAO();
            return $vDAO->retornaVendas();
        }
        
        function cadastrar($input){
            $venda = new venda();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $venda->setForma_pagamento($input['forma_pagamento']);
                $venda->setQtd_parcela($input['qtd_parcela']);
                $venda->setObs($input['obs']);
                $venda->setCliente($input['cliente']);
                $venda->setProduto($input['produto']);
                $venda->setData($input['data']);
                $venda->setFuncionario($input['funcionario']);

                $vDAO = new vendaDAO();
                $vDAO->cadastrarVenda($venda);
                echo "OK";
            } 
        }
        
        function view_cadastrar(){
          
            $vVIEW = new vendaView();
            $vVIEW->cadastrarVenda();
          
        }

        function alterar(){
            $vDAO = new vendaDAO();
            $lista = $vDAO->listaTudo();		
            $venda = new venda();
            $vVIEW = new vendaView();
            
             if($_SERVER['REQUEST_METHOD']=='POST'){

                if(isset($_POST['cod_venda'])){
                    $cod_venda = $_POST['cod_venda'];
                    $venda = $vDAO->listaUm($cod_venda);
                    $_REQUEST['venda']=$venda;
                    $_REQUEST['lista']=$lista;
                    $vVIEW->editarvenda();
                }
                if(isset($_POST['cod_cliente']) && $_POST['cod_cliente']!= NULL){
                    $venda->setCod_venda($_POST['cod_venda']);
                    $venda->setForma_pagamento($_POST['forma_pagamento']);
                    $venda->setQtd_parcela($_POST['qtd_parcela']);
                    $venda->setObs($_POST['obs']);
                    $venda->cliente->setCod_cliente($_POST['cliente_cod']);
                    $venda->produto->setCod_produto($_POST['produto_cod']);

                    $vDAO->editarVenda($venda);
                    $vVIEW->redirecionar("View_Alterar", "MODIFICAÇÃO BEM SUCEDIDA !!");
                }
            }
        }
		
        function View_Alterar(){
            $vDAO = new vendaDAO();
            $lista = $rDAO->listaTudo();
            $_REQUEST['lista']=$lista;
			
            $vVIEW = new vendaView();
            $vVIEW->editarVenda();
        }
		
        function excluir(){
			
            $venda = new venda();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $venda->setCod_venda($_POST['cod_venda']);
                $vDAO = new vendaDAO();
                $vDAO->excluirVenda($venda);
                echo "OK";
            }
        }
		
	function View_Excluir(){
            $rVIEW = new vendaView();
            $vVIEW->excluirVenda();
	}
            
}       
        
        