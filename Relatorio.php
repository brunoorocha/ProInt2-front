<?php
include_once('./view/Head.php');
$pageTitle = "Relatórios";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

    <body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableFuncionarios()">
        <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

        <div class="mask"></div>

        <div class="col fixed-height">
            <?php include_once('./view/NavBar.php'); ?>
            <?php include_once('./view/Breadcrumb.php'); ?>
            <!-- Container -->
            <div class="container">
                <div class="row no-gutters">
                    <div class="col center-content">
                        <section>                                                        
                            <!-- Data Table Component -->
                            <div class="table-responsive">
                                <table id="tableRelatorio" class="table">
                                    <thead>
                                        <tr>
                                            <th>Saldo</th>
                                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Venda</th>                                                                                       
                                            <th></th>
                                        </tr>                                        
                                    </thead>
                                    
                                    <tbody>       
                                    </tbody>
                                </table>                               
                            </div>                                                        
                            
                        </section>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>
</html>