<?php
    include_once('./view/Head.php');
    $pageTitle = "Caixa";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

<body page-title="<?php echo strtolower($pageTitle); ?>" onload="">
    <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>        

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
                                            <th>Data</th>
                                            <th>Cliente</th>
                                            <th class="sm-cell-hide">Forma de Pagamento</th>                                            
                                            <th>Funcionário que realizou a venda</th>
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

        <a href="#" data-toggle="modal" data-target="#adicionarProdutoModal" class="floating-action-button md-floating-button btn-primary">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
