<?php   //conexão
           require_once './conexao.php'; 
           require_once './controller/produtoController.php';
           require_once './model/produto.class.php';
           require_once './model/produtoDAO.class.php';

           $bd = new conexao("localhost", "root", "", "otica");
           $con = $bd->conecta();
           $produto = new produto();
//           $produto->setNome('victoria');
//           $produto->setPreco_fabrica(230.30);
//           $produto->setPreco_revenda(300.00);
//           $produto->setFornecedor('victoria');


           $fDAO = new produtoDAO();
//           $fDAO->cadastrarProduto($produto);
           $produto = $fDAO->retornaProdutos();
           $id=1;
           foreach ($produto as $linha) {
           		$cod = $linha->getCod_produto();
           		if ($cod == $id) {
           			$fDAO->excluirproduto($linha);
           		}
           }
//           foreach ($produto as $linha) {
//           		$cod = $linha->getCod_produto();
//           		if ($cod == $id) {
//           			$nome = 'rafaella';
//           			$linha->setNome($nome);
//           			$fDAO->atualizarproduto($linha);
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
		foreach ($produto as $linha) {
			$nome = $linha->getNome();
      $cod = $linha->getCod_produto();      

            echo "
                  <h1>$nome</h1>
                  <h1>$cod</h1>
                 ";
        }
		
		
	?>
</body>
</html>


