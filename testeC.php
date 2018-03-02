<?php   //conexão
           require_once './conexao.php'; 
           require_once './controller/clienteController.php';
           require_once './model/cliente.class.php';
           require_once './model/clienteDAO.class.php';

           new conexao("localhost", "root", "", "otica");
           $con = $bd->conecta();
           $cliente = new cliente();
//           $cliente->setNome('victoria');
//           $cliente->setProfissao('victoria');
//           $cliente->setEndereco('victoria');
//           $cliente->setRg('victoria');
//           $cliente->setCpf('victoria');
//           $cliente->setFiliacao('victoria');
//           $cliente->setNaturalidade('victoria');
//           $cliente->setData_nasc('victoria');
//           $cliente->setNome_conjuge('victoria');
//           $cliente->setProfissao_conjuge('victoria');
//           $cliente->setReferencia('victoria');
//           $cliente->setTelefone_referencia('victoria');

           $fDAO = new clienteDAO();
//           $fDAO->cadastrarCliente($cliente);
           $cliente = $fDAO->retornaClientes();
           $id=2;
           foreach ($cliente as $linha) {
           		$cod = $linha->getCod_cliente();
           		if ($cod == $id) {
           			$fDAO->excluirCliente($linha);
           		}
           }
//           foreach ($cliente as $linha) {
//           		$cod = $linha->getCod_cliente();
//           		if ($cod == $id) {
//           			$nome = 'rafaella';
//           			$linha->setNome($nome);
//           			$fDAO->atualizarcliente($linha);
//           		}
//           }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		foreach ($cliente as $linha) {
			$nome = $linha->getNome();
      $cod = $linha->getCod_cliente();      

            echo "
                  <h1>$nome</h1>
                  <h1>$cod</h1>
                 ";
        }
		
		
	?>
</body>
</html>


