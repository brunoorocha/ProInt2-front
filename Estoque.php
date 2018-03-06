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

        <div id="adicionarProdutoModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Produto</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form id="add-product-form" class="" action="" method="post">
                        <div class="fields">
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
                        </div>

                        <div class="row no-gutters modal-button-bar">
                            <input type="button" name="cancel-button" data-dismiss="modal" value="Cancelar">
                            <input type="submit" name="save-button" class="btn-primary" value="Salvar">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- Nav Mask Component -->
        <div class="mask"></div>

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
                                    </tbody>
                                </table>
                                <p class="clear-margins align-right">Itens no estoque: <b id="table-itens-count">52</b></p>
                            </div>
                            
                        </section>

                    </div>
                </div>
            </div>
        </div>

        <a href="#" data-toggle="modal" data-target="#adicionarProdutoModal" class="floating-action-button md-floating-button btn-primary">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
