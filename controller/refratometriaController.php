<?php
    
    class refratometriaController{
    
        public function __construct() {
            
            require_once 'model/refratometriaDAO.class.php';
            require_once 'view/refratometriaView.php';
            require_once 'model/refratometria.class.php';
            require_once 'model/cliente.class.php';
            
        }
        
        
        function cadastrar(){
            $refratometria = new refratometria();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $refratometria->setOdesf($_POST['odesf']);
                $refratometria->setOdcil($_POST['odcil']);
                $refratometria->setOdeixo($_POST['odeixo']);
                $refratometria->setOddmp($_POST['oddmp']);
                $refratometria->setOeesf($_POST['oeesf']);
                $refratometria->setOecil($_POST['oecil']);
                $refratometria->setOeeixo($_POST['oeeixo']);
                $refratometria->setOedmp($_POST['oedmp']);
                $refratometria->setCliente_cod($_POST['cliente_cod']);
            

                $rDAO = new refratometriaDAO();
                $rDAO->cadastrarRefratometria($refratometria);
                echo "OK";
            } 
        }
        
        function view_cadastrar(){
          
            $rVIEW = new refratrometriaView();
            $rVIEW->cadastrarRefratometria();
          
        }

        function alterar(){
            $rDAO = new refratometriaDAO();
            $lista = $rDAO->listaTudo();		
            $refratometria = new refratometria();
            $rVIEW = new refratometriaView();
            
             if($_SERVER['REQUEST_METHOD']=='POST'){

                if(isset($_POST['cod_refrato'])){
                    $cod_refratometria = $_POST['cod_refrato'];
                    $refratometria = $rDAO->listaUm($cod_refrato);
                    $_REQUEST['refratometria']=$refratometria;
                    $_REQUEST['lista']=$lista;
                    $rVIEW->editarRefratometria();
                }
                if(isset($_POST['cod_cliente']) && $_POST['cod_cliente']!= NULL){
                    $refratometria->setCod_refrato($_POST['cod_refrato']);
                    $refratometria->setOdesf($_POST['odesf']);
                    $refratometria->setOdcil($_POST['odcil']);
                    $refratometria->setOdeixo($_POST['odeixo']);
                    $refratometria->setOddmp($_POST['oddmp']);
                    $refratometria->setOeesf($_POST['oeesf']);
                    $refratometria->setOecil($_POST['oecil']);
                    $refratometria->setOeeixo($_POST['oeeixo']);
                    $refratometria->setOedmp($_POST['oedmp']);
                    $refratometria->setCliente_cod($_POST['cliente_cod']);

                    $rDAO->editarRefratometria($refratometria);
                    $rVIEW->redirecionar("View_Alterar", "MODIFICAÇÃO BEM SUCEDIDA !!");
                }
            }
        }
		
        function View_Alterar(){
            $rDAO = new refratometriaDAO();
            $lista = $rDAO->listaTudo();
            $_REQUEST['lista']=$lista;
			
            $rVIEW = new refratometriaView();
            $rVIEW->editarRefratometria();
        }
		
        function excluir(){
			
            $refratometria = new refratometria();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $refratometria->setCod_refrato($_POST['cod_refrato']);
                $rDAO = new refratometriaDAO();
                $rDAO->excluirRefratometria($refratometria);
                echo "OK";
            }
        }
		
	function View_Excluir(){
            $rVIEW = new refratometriaView();
            $rVIEW->excluirRefratometria();
	}
            
}       
        
        