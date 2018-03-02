<?php   //conexão
           require_once './conexao.php'; 
           require_once './controller/produtoController.php';
           require_once './model/funcionario.class.php';
           require_once './model/funcionarioDAO.class.php';

           new conexao("localhost", "root", "", "otica");
           $con = $bd->conecta();
           $funci = new funcionario();
//           $funci->setLogin('victoria');
//           $funci->setSenha('123');
           $fDAO = new funcionarioDAO();
//           $fDAO->cadastrarFuncionario($funci);
           $funci = $fDAO->retornaFuncionarios();
           $id=1;
//           foreach ($funci as $linha) {
//           		$cod = $linha->getCod_funci();
//           		if ($cod == $id) {
//           			$fDAO->excluirFuncionario($linha);
//           		}
//           }
           foreach ($funci as $linha) {
           		$cod = $linha->getCod_funci();
           		if ($cod == $id) {
           			$login = 'victoria';
           			$linha->setLogin($login);
           			$fDAO->atualizarFuncionario($linha);
           		}
           }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		foreach ($funci as $linha) {
			$login = $linha->getLogin();
            $senha = $linha->getSenha();
            $id = $linha->getCod_funci();

            echo "
                  <h1>$login</h1>
                  <h1>$senha</h1>
                  <h1>$id</h1>
                 ";
        }
		
		
	?>
</body>
</html>


