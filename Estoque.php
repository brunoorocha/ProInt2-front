<?php
    include_once('./view/Head.php');
    $pageTitle = "Estoque";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

<body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableProdutos()">
    <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

        <!-- Nav Mask Component -->
        <div class="mask"></div>

        <div class="modal-mask">
        </div>
        <div class="modal">
            <div class="row no-gutters modal-title">
                <i class="material-icons">add</i>
                <h4>Adicionar Produto</h4>
            </div>

            <form id="add-product-form" class="" action="" method="post">

                <label for="cod_produto">Código:</label>
                <input type="text" id="cod_produto" name="cod_produto" value="">

                <label for="nome">Nome do Produto:</label>
                <input type="text" id="nome" name="nome" value="">

                <label for="preco_fabrica">Preço de Fábrica:</label>
                <input type="text" id="preco_fabrica" name="preco_fabrica" value="">

                <label for="preco_revenda">Preço de Revenda:</label>
                <input type="text" id="preco_revenda" name="preco_revenda" value="">

                <label for="fornecedor">Fornecedor:</label>
                <input type="text" id="fornecedor" name="fornecedor" value="">

                <div class="row no-gutters modal-button-bar">
                    <input type="button" name="cancel-button" value="Cancelar">
                    <input type="submit" name="save-button" value="Salvar">
                </div>
            </form>
        </div>

        <div class="col fixed-height">
            <?php include_once('./view/NavBar.php'); ?>
            <?php include_once('./view/Breadcrumb.php'); ?>
            <!-- Container -->
            <div class="container">
                <div class="row no-gutters">
                    <div class="col center-content">
                        <section>
                            <!-- <h3>Produtos</h3> -->
                            <!-- Data Table Component -->
                            <div class="table-responsive">
                                <table id="tableProdutos" class="table">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Produto</th>
                                            <th class="sm-cell-hide">Preço Revenda</th>
                                            <th class="md-cell-hide">Fornecedor</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <!-- <tr> 
                                            <td>Armação de Metal</td>
                                            <td>10</td>
                                            <td class="sm-cell-hide">R$ 350,00</td>
                                            <td class="md-cell-hide">Armações Ltda.</td>
                                            <td><i class="material-icons">info</i></td>
                                        </tr> -->

                                    </tbody>
                                </table>
                                <p class="clear-margins align-right">Itens no estoque: 52</p>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>

        <a href="#" id="add-product-button" class="floating-action-button md-floating-button">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
