<?php

    class produtoView{
        
        private function cab(){
            echo "<!DOCTYPE html>
                <html lang='pt-br'>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' type='text/css' href='../css/produto.css'>
                        <link rel='icon' href='../img/produtos.png'/>
                        <script language='JavaScript'>

                            function valida(formulario){

                                if(formulario.nome.value=='')
                                    alert('Nome não foi preenchido');
                                    return false;

                                }

                                if(formulario.preco_fabrica.value==''){
                                    alert('Preço de fábrica não foi preenchida');
                                    return false;
                                }

                                if(formulario.preco_revenda.value==''){
                                    alert('Preço de revenda não foi preenchida');
                                    return false;
                                }

                                if(formulario.fornecedor.value==''){
                                    alert('Fornecedor não foi preenchido');
                                    return false;
                                }

                                

                            return true;
                        </script>
                        
                        <title>
                            Produtos
                        </title>
                    </head>
                    <body id='opafion'>
                        <article>
                            <div id='lg'><h1>Produtos</h1></div>";
        }
        
        private function rod(){
            echo "      </article>
			
                        <div id='rodape'></div>
		    </body>
                </html>";
        }   
        
        public function listaTudo(){
            $this->cab();
            $lista=$_REQUEST['lista'];               
            
            foreach ($lista as $linha){
                
                $cod = $linha->getCod_produto();
                $nome=$linha->getNome();
                $preco_fabrica=$linha->getPreco_fabrica();
                $preco_revenda=$linha->getPreco_revenda();
                $fornecedor=$linha->getFornecedor();
               
                echo "
                            
                    <div class='nome'>
		                     <h5>$nome</h5>
                            </div>
                    </div>
                    <div class='preco'>
                         <h5>$preco_revenda</h5>
                            </div>
                    </div>";
                
            }   
            $this->rod();
        }
        
        
        
        
        
        public function inserirProd(){
            $this->cab();
            
            echo "<form action='index.php' method='POST' onsubmit='return valida(this)'>
                  <label for='nome'>Nome:</label>
                  <input type='text' name='nome' id='nome'><br/>   
                  
                  <label for='des'>Descricao:</label>
                  <input type='text' name='des' id='des'><br/>
                  
                  <label for='qtd'>Quantidade:</label>
                  <input type='text' name='qtd' id='qtd'><br/>
                  
                  <label for='preco'>Preco:</label>
                  <input type='text' name='preco' id='preco'><br/>

                  <label for='img'>Imagem:</label>
                  <input type='text' name='img' id='img'><br/>
                  
                  <input type='hidden' name='classe' value='produto'>
                  <input type='hidden' name='metodo' value='inserir'>
                  <input type='submit' value='Ok'>
                  </form>
                  ";
            $this->rod();
        }


    
     public function atualizarProd(){
        $this->cab();
        $lista=$_REQUEST['lista'];
		

        echo "<form action='index.php' method='POST'>
                <label for='codigo'>Código :</label>
                <select class='' name='codigo'>
                        <option value=''>Produtos</option>
        ";

        foreach ($lista as $linha){

            $cod = $linha->getCodigo();
            $nome = $linha->getNome();
            $desc = $linha->getDes();

            echo "<option value=$cod>$nome $desc</option>";   
        }

        if(isset($_REQUEST['prod']) && $_REQUEST['prod']!=""){
            $prod = $_REQUEST['prod'];
            $cod_prod = $prod->getCodigo();
            $nome_prod = $prod->getNome();
            $desc_prod = $prod->getDes();
            $preco_prod = $prod->getPreco();
            $qtd_prod = $prod->getQtd();
            $img_prod = $prod->getImg();
        }
        else{
            $cod_prod = "";
            $nome_prod = "";
            $desc_prod = "";
            $preco_prod = "";
            $qtd_prod = "";
            $img_prod = "";
        }

        echo " </select> <br/>               
                  <input type='hidden' name='classe' value='produto'>
                  <input type='hidden' name='metodo' value='alterar'>
                  <input type='submit' value='Selecionar Produto'>
                  </form><br/> <br/> 

                  <form action='index.php' method='POST'>
                  <label for='cod'>Código :</label>
                  <input type='text' name='cod' value=$cod_prod><br/> 
                  <label for='nome'>Nome :</label>
                  <input type='text' name='nome' value=$nome_prod><br/> 
                  <label for='desc'>Descrição :</label>
                  <input type='text' name='desc' value=$desc_prod><br/> 
                  <label for='preco'>Preço :</label>
                  <input type='text' name='preco' value=$preco_prod><br/> 
                  <label for='qtd'>Quantidade :</label>
                  <input type='text' name='qtd' value=$qtd_prod><br/> 
                  <label for='img'>Imagem :</label>
                  <input type='text' name='img' value=$img_prod><br/> 

                  <input type='hidden' name='classe' value='produto'>
                  <input type='hidden' name='metodo' value='alterar'>
                  <input type='submit' value='Atualizar'>
                  </form>  
        ";
		
        $this->rod();
    }
		
     public function excluirProd(){
            $this->cab();
            
            echo "<form action='index.php' method='POST'>
                
                  <label for='codigo'>codigo:</label>
                  <input type='text' name='codigo' id='codigo'><br/> 
                  <input type='hidden' name='classe' value='produto'>
                  <input type='hidden' name='metodo' value='excluir'>
                  <input type='submit' value='Ok'>
                  </form>
                  ";
            $this->rod();
    }
    
    public function redirecionar($url, $status) {
        
        echo "<!DOCTYPE html>
                <html lang='pt-br'>
                    <head>
                        <meta charset='UTF-8'>
                        <link rel='stylesheet' type='text/css' href='../css/produto.css'>
                        <link rel='icon' href='../img/produtos.png'/>
                        <title>
                            Produtos
                        </title>
                    </head>
                    <body id='opafion' onLoad='Contar()'>
                        <article>
                            <div id='lg'><h1>$status</h1></div>
                        </article> 
                        <script language= 'JavaScript'>
                            var Num = 4;

                            function Contar(){
                                if(Num == 0){
                                    window.location.href ='$url' ;
                                }
                                else{
                                    Num = Num - 1;
                                    window.setTimeout('Contar()',1000);
                                }

                            }

                        </SCRIPT>
                    </body>
                </html>";
        
    }
        
    }

    
    
    
    
    
    
    
                                       