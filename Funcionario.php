<?php
include_once('./view/Head.php');
$pageTitle = "Funcionários";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

    <body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableFuncionarios()">
        <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

            <div id="adicionarFuncionarioModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Adicionar Funcionário</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form id="add-funcionario-form" class="" action="" method="post">

                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" name="nome" value="">
                                <label for="login">Login:</label>
                                <input type="text" id="login" name="login" value="">

                                <label for="senha">Senha:</label>
                                <input type="password" id="senha" name="senha" value="">

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
                            <!-- <h3>Produtos</h3> -->
                            <!-- Data Table Component -->
                                <div class="table-responsive">
                                    <table id="tableFuncionarios" class="table">
                                        <thead>
                                            <tr>
                                                <th>Funcionário</th>
                                                <th>Login</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <!-- <tr> 

                                        <td>Bianca</td>
                                        <td>abc123</td>

                                        <td><i class="material-icons">info</i></td>
                                        </tr> -->

                                    </tbody>
                                </table>
                                <p class="clear-margins align-right">Funcionários cadastrados: <b id="table-itens-count"></b></p>
                            </div>
                        </section>

                        </div>
                    </div>
                </div>
            </div>

            <a href="#" data-toggle="modal" data-target="#adicionarFuncionarioModal" class="floating-action-button md-floating-button btn-primary">
                <i class="material-icons">add</i>
            </a>
        </div>

    <?php include_once('./view/NavBottom.php'); ?>
    </body>

</html>
