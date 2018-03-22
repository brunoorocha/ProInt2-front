<?php
include_once('./view/Head.php');
$pageTitle = "Acesso";
?>

<!DOCTYPE html>
<html>
<?php includeHead($pageTitle); ?>
    <head>
    <link rel="stylesheet" href="./css/style-login.css"></head>

    <body page-title="<?php echo strtolower($pageTitle); ?>">
        <div class="row no-gutters">

            <div class="mask"></div>

            <div class="col fixed-height">
                <div class="navbar appbar">
                    <div class="row no-gutters">

                        <div class="col">
                            <!-- Page Title Component -->
                            <h3><?php echo $pageTitle; ?></h3>
                        </div>
                    </div>
                </div>
           
            <!-- Container -->
               
                    
                            <div class="row colored" id ="divLogin">
                                <div id="contentdiv" class="contcustom">
                                    <i class="material-icons blue-text" style="font-size: 5em;">account_circle</i>
                                 
                                    <div>
                                        <input id="username" class="loginInput" type="text" placeholder="Login" >
                                        <input id="password" class="loginInput" type="password" placeholder="Senha" >
                                        <i class="material-icons" style="font-size: 3em;">check_circle</i></a>
                                    </div>
                      
        </div>
    </div>
                        
                
            </div>

           
        </div>
    </body>

</html>
