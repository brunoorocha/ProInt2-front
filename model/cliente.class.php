<?php

class cliente {
    private  $nome;
    private  $cod_cliente;
    private  $profissao;
    private  $endereco;
    private  $rg;
    private  $cpf;
    private  $filiacao;
    private $naturalidade;
    private $data_nasc;
    private $nome_conjuge;
    private $profissao_conjuge;
    private $referencia;
    private $telefone_referencia;

    public function __construct() {

        $n_args = (int) func_num_args();
        $args = @func_get_arg();

        if($n_args ==0){
          $this->cod_cliente = " ";
          $this->nome = " ";
          $this->profissao = " ";
          $this->endereco = " ";
          $this->rg = " ";
          $this->cpf = " ";
          $this->filiacao = " ";
          $this->naturalidade = " ";
          $this->data_nasc = " ";
          $this->nome_conjuge = " ";
          $this->profissao_conjuge = " ";
          $this->referencia = " ";
          $this->telefone_referencia = " ";

        }
        if($n_args == 13){
          $this->cod_cliente = $args[0];
          $this->nome = $args[1];
          $this->profissao = $args[2];
          $this->endereco = $args[3];
          $this->rg = $args[4];
          $this->cpf = $args[5];
          $this->filiacao = $args[6];
          $this->naturalidade = $args[7];
          $this->data_nasc = $args[8];
          $this->nome_conjuge = $args[9];
          $this->profissao_conjuge = $args[10];
          $this->referencia = $args[11];
          $this->telefone_referencia = $args[12];
          

        }
    }
     
    function setNome($nome){
       $this->nome = $nome;     
    }
     
    function setCod_cliente($cod_cliente){
       $this->cod_cliente = $cod_cliente;     
    }
     
    function setProfissao($profissao){
       $this->profissao = $profissao;     
    }
     
    function setEndereco($endereco){
       $this->endereco = $endereco;     
    }
     
    function setRg($rg){
       $this->rg = $rg;     
    }
     
    function setCpf($cpf){
       $this->cpf = $cpf;     
    }

    function setFiliacao($filiacao){
       $this->filiacao = $filiacao;     
    }

    function setNaturalidade($naturalidade){
       $this->naturalidade = $naturalidade;     
    }

    function setData_nasc($data_nasc){
       $this->data_nasc = $data_nasc;     
    }

    function getNome(){
       return $this->nome;     
    }
     
    function getCod_cliente(){
       return $this->cod_cliente;     
    }
     
    function getProfissao(){
       return $this->profissao;     
    }
     
    function getEndereco(){
       return $this->endereco;     
    }
     
    function getRg(){
       return $this->rg;     
    }
     
    function getCpf(){
       return $this->cpf;     
    }

    function getFiliacao(){
       return $this->filiacao;     
    }
     
    function getNaturalidade(){
       return $this->naturalidade;     
    }
     
    function getData_nasc(){
       return $this->data_nasc;     
    }
    function setNome_conjuge($nome_conjuge){
       $this->nome_conjuge = $nome_conjuge;
   }
    function getNome_conjuge(){
      return $this->nome_conjuge;
    }
    function setProfissao_conjuge($profissao_conjuge){
       $this->profissao_conjuge = $profissao_conjuge;
    }
    function getProfissao_conjuge(){
      return $this->profissao_conjuge;
    }
    function SetTelefone_referencia($telefone_referencia){
       $this->telefone_referencia = $telefone_referencia;
    }
    function getTelefone_referencia(){
      return $this->telefone_referencia;
    }
    function setReferencia($referencia){
       $this->referencia = $referencia;
    }
    function getReferencia(){
      return $this->referencia;
    }
    
}