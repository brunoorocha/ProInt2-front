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
        <div class="row no-gutters" id ="divLogin">
            <div id="contentdiv" class="col contcustom">        
                <div class="login-header-bar">
                    <i class="material-icons">account_circle</i>
                </div>
                
                <form>
                    <label for="username">Login:</label>
                    <input id="username" class="loginInput" type="text">
                    
                    <label for="username">Senha:</label>
                    <input id="password" class="loginInput" type="password">

                    <input type="submit" class="" value="Entrar">
                    
                </form>                      
            </div>
        </div>                                                
    </body>
</html>
