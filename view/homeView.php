<?php

    class homeView{
        function menu(){
            echo" 
         <html lang='pt-br'>
                    <head>
                        <title> |Home |</title>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' type='text/css' href='../css/inicio.css'>
                    </head>
                    <body>       
        <nav id='menu'>
            <ul>
                    <li><a href='../produto/listar'>Listar Produtos</a></li>
                    <li><a href='../produto/View_Inserir'>Cadastrar Produtos</a></li>
                    <li><a href='../produto/View_Alterar'>Atualizar Produtos</a></li>
                    <li><a href='../produto/View_Excluir'>Deletar Produtos</a></li>
            </ul>
        </nav>
        </body>
        </html>
        ";
            
        }
    }