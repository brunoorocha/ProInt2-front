<?php
    
    class funcionarioController{
    
        public function __construct() {
            
            require_once 'model/funcionarioDAO.class.php';
            require_once 'model/funcionario.class.php';
            
        }
        
        
        function cadastrar($input){
            $funcionario = new funcionario();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $funcionario->setLogin($input['login']);
                $funcionario->setSenha($input['senha']);
                $funcionario->setNome($input['nome']);

                $fDAO = new funcionarioDAO();
                $fDAO->cadastrarFuncionario($funcionario);
                echo "OK";
            } 
        }

        function visualizar_todos() {
            $funcionarioDAO = new FuncionarioDAO();
            $result = $funcionarioDAO->retornaFuncionarios();            
            
            if($result == NULL) {                
                return NULL;
            }
            return json_encode($result);
        }
        
        function view_cadastrar(){
          
            $fVIEW = new funcionarioView();
            $fVIEW->cadastrarfuncionario();
          
        }
		
        function excluir(){
			
            $funcionario = new funcionario();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $funcionario->setCod_funcionario($_POST['cod_funcionario']);
                $fDAO = new funcionarioDAO();
                $fDAO->excluirFuncionario($funcionario);
                echo "OK";
            }
        }
		
	function View_Excluir(){
            $fVIEW = new funcionarioView();
            $fVIEW->excluirFuncionario();
	}
            
    }       
        
        