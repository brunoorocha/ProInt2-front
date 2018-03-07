<?php
include_once('./view/Head.php');
$pageTitle = "Clientes";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

    <body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableClientes()">
        <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

            <div id="adicionarClienteModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="material-icons">person_add</i>Adicionar Cliente</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form id="add-cliente-form" class="" action="" method="post">
                                <div class="fields">
                                    <label for="nome">Nome:</label>
                                    <input type="text" id="nome" name="nome" value="">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" id="cpf" name="cpf" value="">
                                    <label for="rg">RG:</label>
                                    <input type="text" id="rg" name="rg" value="">
                                    <label for="naturalidade">Naturalidade:</label>
                                    <input type="text" id="naturalidade" name="naturalidade" value="">
                                    <label for="filiacao">Filiação:</label>
                                    <input type="text" id="filiacao" name="filiacao" value="">
                                    <label for="profissao">Profissão:</label>
                                    <input type="text" id="profissao" name="profissao" value="">
                                    <label for="endereco">Endereço:</label>
                                    <input type="text" id="endereco" name="endereco" value="">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone" value="">
                                    <label for="nome_conjuge">Cônjuge:</label>
                                    <input type="text" id="nome_conjuge" name="nome_conjuge" value="">
                                    <label for="profissao_conjuge">Profissão do cônjuge:</label>
                                    <input type="text" id="profissao_conjuge" name="profissao_conjuge" value="">
                                    <label for="referencia">Referência:</label>
                                    <input type="text" id="referencia" name="referencia" value="">
                                    <label for="telefone_referencia">Telefone da referência:</label>
                                    <input type="text" id="telefone_referencia" name="telefone_referencia" value="">
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

            <div id="infoClienteModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="material-icons">info</i>Cliente</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form id="edit-cliente-form" class="" action="" method="post">
                                <div class="fields">
                                    <input type="hidden" id="cod_cliente" name="cod_cliente" value="">
                                    <label for="nome">Nome:</label>
                                    <input type="text" id="nome" name="nome" value="">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" id="cpf" name="cpf" value="">
                                    <label for="rg">RG:</label>
                                    <input type="text" id="rg" name="rg" value="">
                                    <label for="naturalidade">Naturalidade:</label>
                                    <input type="text" id="naturalidade" name="naturalidade" value="">
                                    <label for="filiacao">Filiação:</label>
                                    <input type="text" id="filiacao" name="filiacao" value="">
                                    <label for="profissao">Profissão:</label>
                                    <input type="text" id="profissao" name="profissao" value="">
                                    <label for="endereco">Endereço:</label>
                                    <input type="text" id="endereco" name="endereco" value="">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone" value="">
                                    <label for="nome_conjuge">Cônjuge:</label>
                                    <input type="text" id="nome_conjuge" name="nome_conjuge" value="">
                                    <label for="profissao_conjuge">Profissão do cônjuge:</label>
                                    <input type="text" id="profissao_conjuge" name="profissao_conjuge" value="">
                                    <label for="referencia">Referência:</label>
                                    <input type="text" id="referencia" name="referencia" value="">
                                    <label for="telefone_referencia">Telefone da referência:</label>
                                    <input type="text" id="telefone_referencia" name="telefone_referencia" value="">
                                </div>

                                <div class="row no-gutters modal-button-bar space-bettwen">
                                    <input type="button" name="edit-button" value="Editar">
                                    <button id="removeCliente" class="btn-delete">Remover</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <div class="col cliente-labels">                                        
                                        <p><i class="material-icons" style="color: var(--green);">label</i><span>Em dias</span></p>
                                        <p><i class="material-icons" style="color: var(--yellow);">label</i><span>Em atraso</span></p>                                        
                                        <p><i class="material-icons" style="color: var(--red);">label</i><span>Bloqueado</span></p>
                                        <p><i class="material-icons" style="color: var(--gray);">label</i><span>Quitado</span></p>                               
                                    </div>
                                </div>
                    
                                <div class="table-responsive">
                                    <table id="tableClientes" class="table">                                                                               
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th class="align-center">Status</th>
                                                <th class="sm-cell-hide">Telefone</th>
                                                <th class="md-cell-hide">Refratometria</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>


                                        </tbody>
                                    </table>                                    
                                </div>                                
                                <p class="clear-margins align-right">Clientes: <b id="table-itens-count">0</b></p>
                            </section>

                        </div>
                    </div>
                </div>
            </div>

            <a href="#" data-toggle="modal" data-target="#adicionarClienteModal" class="floating-action-button md-floating-button btn-primary">
                <i class="material-icons" data-toggle="tooltip" data-placement="left" title="Adicionar Cliente">person_add</i>
            </a>
        </div>

    <?php include_once('./view/NavBottom.php'); ?>
    </body>

</html>
