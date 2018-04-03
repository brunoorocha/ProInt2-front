<?php
    include_once('./view/Head.php');
    $pageTitle = "Refratometria";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

<body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableRefratometria()">
    <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

        <div id="adicionarRefratometriaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Refratometria</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form id="add-refratometria-form" class="" action="" method="post">
                        <div class="fields">
                            <input type="hidden" id="cod_cliente" name="cod_cliente" value="">
                            <label for="data">Data:</label>
                            <input type="date" id="data" name="data" value="">
    
                            <label for="odesf">ODESF:</label>
                            <input type="text" id="odesf" name="odesf" value="">
    
                            <label for="odcil">ODCIL:</label>
                            <input type="text" id="odcil" name="odcil" value="">
    
                            <label for="odeixo">ODEIXO:</label>
                            <input type="text" id="odeixo" name="odeixo" value="">
    
                            <label for="oddmp">ODDMP:</label>
                            <input type="text" id="oddmp" name="oddmp" value="">

                            <label for="oeesf">OEESF:</label>
                            <input type="text" id="oeesf" name="oeesf" value="">
    
                            <label for="oecil">OECIL:</label>
                            <input type="text" id="oecil" name="oecil" value="">
    
                            <label for="oeeixo">OEEIXO:</label>
                            <input type="text" id="oeeixo" name="oeeixo" value="">
    
                            <label for="oedmp">OEDMP:</label>
                            <input type="text" id="oedmp" name="oedmp" value="">
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

        <div id="infoRefratometriaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Refratometria</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form id="edit-refratometria-form" class="" action="" method="post">
                        <div class="fields">
                            <label for="data">Data:</label>
                            <input type="data" id="data" name="data" value="">
    
                            <label for="odesf">ODESF:</label>
                            <input type="text" id="odesf" name="odesf" value="">
    
                            <label for="odcil">ODCIL:</label>
                            <input type="text" id="odcil" name="odcil" value="">
    
                            <label for="odeixo">ODEIXO:</label>
                            <input type="text" id="odeixo" name="odeixo" value="">
    
                            <label for="oddmp">ODDMP:</label>
                            <input type="text" id="oddmp" name="oddmp" value="">

                             <label for="oeesf">OEESF:</label>
                            <input type="text" id="oeesf" name="oeesf" value="">
    
                            <label for="oecil">OECIL:</label>
                            <input type="text" id="oecil" name="oecil" value="">
    
                            <label for="oeeixo">OEEIXO:</label>
                            <input type="text" id="oeeixo" name="oeeixo" value="">
    
                            <label for="oedmp">OEDMP:</label>
                            <input type="text" id="oedmp" name="oedmp" value="">
                        </div>

                        <div class="row no-gutters modal-button-bar primary space-bettwen">
                            <input type="button" id="edit-button" name="edit-button" value="Editar">
                            <button id="removeReratometria" class="btn-delete">Remover</button>
                        </div>

                        <div class="row no-gutters modal-button-bar secondary">
                            <input type="button" id="cancel-edit-button" name="cancel-edit-button" value="Cancelar">
                            <input type="submit" name="save-button" class="btn-primary hidden" value="Salvar">                                    
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
                            <div class="row align-right">                                    
                                <div class="col">                                        
                                    <p>Data: 23/11/2017</p>                              
                                </div>
                            </div>
                            <!-- <h3>Produtos</h3> -->
                            <!-- Data Table Component -->
                            <div class="table-responsive">
                                <table id="tableRefratometria" class="table">
                                    <thead>
                                        <tr>
                                            <th>Olho</th>
                                            <th>Esférico</th>
                                            <th>Cilíndrico</th>
                                            <th>Eixo</th>      
                                            <th>Cilíndrico</th>                                      
                                            <th></th>
                                        </tr>                                        
                                    </thead>
                                    
                                    <tbody>       
                                    </tbody>
                                </table>                               
                            </div>
                            
                            <p><b>Adições: </b> adições</p>
                            <p><b>Observações: </b> adições</p>

                            <div class="row no-gutters content-center">
                                <div class="">
                                    <a href="" class="btn-default btn-large">Ver histórico</a>
                                </div>                                
                            </div>                            
                        </section>

                    </div>
                </div>
            </div>
        </div>

        <a href="#" data-toggle="modal" data-target="#adicionarRefratometriaModal" class="floating-action-button md-floating-button btn-primary">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
