<?php
    function includeHead($pageTitle) {
        echo '<head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>'. $pageTitle .'</title>
                <link rel="stylesheet" href="./src/bootstrap-4.0.0-dist/css/bootstrap.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link rel="stylesheet" href="./css/style-override.css">
                <script src="./js/jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script type="text/javascript" src="./src/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="./js/functions.js"></script>
                <script type="text/javascript" src="./js/api-requests.js"></script>
            </head>';
    }
?>
