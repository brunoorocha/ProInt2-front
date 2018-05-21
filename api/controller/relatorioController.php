<?php
    
    class relatorioController{
    
        public function __construct() {            
            require_once 'model/relatorioDAO.class.php';            
            require_once 'model/relatorio.class.php';            
        }


        public function cadastrar($input) {
            $relatorio = new relatorio();

            if($_SERVER['REQUEST_METHOD']=='POST') { 
                $relatorio->setSaldo($input['saldo']);
                $relatorio->setEntrada($input['entrada']);
                $relatorio->setSaida($input['saida']);
                $relatorio->setVenda($input['venda']);

                $rDAO = new relatorioDAO();
                $rDAO->cadastrarRel($relatorio);
            }
        }

        public function visualizar_todos() {
            $rDAO = new relatorioDAO();
            $result = $rDAO->retornaRel();

            return $result;
        }
    }