<?php
    
    class clienteController{
    
        public function __construct() {            
            require_once 'model/clienteDAO.class.php';            
            require_once 'model/cliente.class.php';            
        }
        
        
        function cadastrar($input){
            $cliente = new cliente();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $cliente->setNome($input['nome']);
                $cliente->setProfissao($input['profissao']);
                $cliente->setEndereco($input['endereco']);
                $cliente->setRg($input['rg']);
                $cliente->setCpf($input['cpf']);
                $cliente->setFiliacao($input['filiacao']); 
                $cliente->setNaturalidade($input['naturalidade']);
                $cliente->setData_nasc($input['data_nasc']);
                $cliente->setNome_conjuge($input['nome_conjuge']);
                $cliente->setProfissao_conjuge($input['profissao_conjuge']);
                $cliente->setReferencia($input['referencia']);
                $cliente->setTelefone_referencia($input['telefone_referencia']);

                $cDAO = new clienteDAO();
                $cDAO->cadastrarCliente($cliente);
                echo "OK";
            } 
        }

        function visualizar_todos() {
            $clienteDao = new clienteDAO();
            $result = $clienteDao->retornaClientes();            
            
            return $result;            
        }

        function visualizar_um($id) {
            $clienteDao = new clienteDAO();
            $result = $clienteDao->retornaUm($id);            
            
            return $result;            
        }
        
        function view_cadastrar(){
          
            $cVIEW = new clienteView();
            $cVIEW->cadastrarCliente();
          
        }

        function alterar(){
            $cDAO = new clienteDAO();
            $lista = $cDAO->listaTudo();		
            $cliente = new cliente();
            $cVIEW = new clienteView();
            
             if($_SERVER['REQUEST_METHOD']=='POST'){

                if(isset($_POST['cod_cliente'])){
                    $cod_cliente = $_POST['cod_cliente'];
                    $cliente = $cDAO->listaUm($cod_cliente);
                    $_REQUEST['cliente']=$cliente;
                    $_REQUEST['lista']=$lista;
                    $cVIEW->editarCliente();
                }
                if(isset($_POST['cod_cliente']) && $_POST['cod_cliente']!= NULL){
                    $cliente->setNome($_POST['nome']);
                    $cliente->setProfissao($_POST['profissao']);
                    $cliente->setEndereco($_POST['endereco']);
                    $cliente->setRg($_POST['rg']);
                    $cliente->setCpf($_POST['cpf']);
                    $cliente->setFiliacao($_POST['filiacao']);
                    $cliente->setNaturalidade($_POST['naturalidade']);
                    $cliente->setData_nasc($_POST['data_nasc']);
                    $cliente->setNome_conjuge($_POST['nome_conjuge']);
                    $cliente->setProfissao_conjuge($_POST['profissao_conjuge']);
                    $cliente->setReferencia($_POST['referencia']);
                    $cliente->setTelefone_referencia($_POST['telefone_referencia']);
                    $cliente->setCod_cliente($_POST['cod_cliente']);

                    $cDAO->editarCliente($cliente);
                    $cVIEW->redirecionar("View_Alterar", "MODIFICAÇÃO BEM SUCEDIDA !!");
                }
            }
        }
		
        function View_Alterar(){
            $cDAO = new clienteDAO();
            $lista = $cDAO->listaTudo();
            $_REQUEST['lista']=$lista;
			
            $cVIEW = new clienteView();
            $cVIEW->editarCliente();
        }
		
        function excluir($id){			                                    
            $cDAO = new clienteDAO();
            $cDAO->excluirCliente($id);
            echo "OK";        
        }
		
	function View_Excluir(){
            $cVIEW = new clienteView();
            $cVIEW->excluirCliente();
	}
            
    }       
        
        