<?php
    include_once('./view/Head.php');
    $pageTitle = "Principal";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>

<body page-title="<?php echo strtolower($pageTitle); ?>" onload="loadTableProdutos()">
    <div class="row no-gutters">
        <?php include_once('./view/NavLeft.php'); ?>

        <!-- Nav Mask Component -->       

        <div class="col fixed-height">
            <?php include_once('./view/NavBar.php'); ?>            
            <!-- Container -->
            <div class="container">
                <div class="row no-gutters">
                    <div class="col center-content">
                        <section>
                            <h1>Página Inicial</h1> 
                        </section>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <?php include_once('./view/NavBottom.php'); ?>
</body>

</html>
