<?php
    include_once('./view/Head.php');
    $pageTitle = "Caixa";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

<body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableCaixa()">
    <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>        

        <div id="adicionarVendaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Registrar Venda</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form id="add-venda-form" class="" action="" method="post">
                        <div class="fields">
                            <input type="hidden" id="cod_cliente" name="cod_cliente" value="">
                            <label for="data">Data:</label>
                            <input type="date" id="data" name="data" value="">                            

                            <label for="cliente">Cliente:</label>                            
                            <input type="text" id="cliente" name="cliente" value="">                            

                            <label for="produto">Produto:</label>
                            <input type="text" id="produto" name="produto" value="">

                            <label for="forma_pagamento">Forma de Pagamento:</label>
                            <input type="text" id="forma_pagamento" name="forma_pagamento" value="">

                            <label for="qtd_parcela">Quantidade de Parcelas:</label>
                            <input type="number" id="qtd_parcela" name="qtd_parcela" min="1" max="12" value="1">

                            <label for="funcionario">Funcionário que vendeu:</label>
                            <input type="text" id="funcionario" name="funcionario" value="">

                            <label for="obs">Observações:</label>
                            <input type="text" id="obs" name="obs" value="">
                        </div>                        

                        <div class="row no-gutters modal-button-bar">
                            <input type="button" name="cancel-button" data-dismiss="modal" class="btn-default" value="Cancelar">
                            <input type="submit" name="save-button" class="btn-primary btn-default" value="Salvar">
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
                                <table id="tableVendas" class="table">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Cliente</th>
                                            <th class="sm-cell-hide">Forma de Pagamento</th>                                            
                                            <th class="md-cell-hide">Funcionário que vendeu</th>
                                        </tr>
                                    </thead>
                                    <tbody>       
                                    </tbody>
                                </table>
                                <!-- <p class="clear-margins">Itens no estoque: <b id="table-itens-count">52</b></p> -->
                            </div>
                            
                        </section>

                    </div>
                </div>
            </div>
        </div>

        <a href="#" data-toggle="modal" data-target="#adicionarVendaModal" class="floating-action-button md-floating-button btn-primary">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
