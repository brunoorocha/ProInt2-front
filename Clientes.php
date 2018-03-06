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
                            <h4 class="modal-title">Adicionar Cliente</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form id="add-cliente-form" class="" action="" method="post">

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
                                <label for="conjuge">Cônjuge:</label>
                                <input type="text" id="conjuge" name="conjuge" value="">
                                <label for="profissao_conjuge">Profissão do cônjuge:</label>
                                <input type="text" id="profissao_conjuge" name="profissao_conjuge" value="">
                                <label for="referencia">Referência:</label>
                                <input type="text" id="referencia" name="referencia" value="">
                                <label for="telefone_referencia">Telefone da referência:</label>
                                <input type="text" id="telefone_referencia" name="telefone_referencia" value="">

                                <div class="row no-gutters modal-button-bar">
                                    <input type="button" name="cancel-button" value="Cancelar">
                                    <input type="submit" name="save-button" value="Salvar">
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
                             <div class="clear-margins align-left">Clientes: 02
                                        <p class="clear-margins align-right"><i class="material-icons" style="color:green;">label</i>Em dias
                                        <i class="material-icons" style="color:yellow;">label</i>Em atraso
                                        <i class="material-icons" style="color:red;">label</i>Bloqueado
                                        <i class="material-icons" style="color:gray;">label</i>Quitado </p></div>
                                <div class="table-responsive">
                                    <table id="tableClientes" class="table">
                                       
                                    
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>STATUS</th>
                                                <th>Telefone</th>
                                                <th>Refratometria</th>
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

            <a href="#" data-toggle="modal" data-target="#adicionarClienteModal" class="floating-action-button md-floating-button btn-primary">
                <i class="material-icons">add</i>
            </a>
        </div>

    <?php include_once('./view/NavBottom.php'); ?>
    </body>

</html>
