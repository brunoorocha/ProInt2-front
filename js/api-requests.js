
function loadDataFromAPI(endpoint, callback) {
    var resourceUrl = "http://localhost:8000/" + endpoint
    $.get(resourceUrl, function(resources, status){                                     
        if(status == "nocontent") {                            
            callback(null);        
        }    
        
        if(status == "success"){
            callback(resources);        
        }
        
    }, "json")
}

function loadTableProdutos() {
    loadDataFromAPI('produto', function(produtos) {
        if(produtos == null) {                            
            $("#tableProdutos tbody").append("<tr><td colspan=\"3\">Não há produtos para exibir.</td></tr>")
        }         
        else {
            produtos.forEach(function(produto) {                
                var tableRow = '<tr><td>'+ produto.cod_produto +'</td>'
                tableRow    += '<td>'+ produto.nome +'</td>'
                tableRow    += '<td class="sm-cell-hide">'+ produto.preco_fabrica +'</td>'
                tableRow    += '<td class="md-cell-hide">'+ produto.fornecedor +'</td>'
                tableRow    += '<td><i class="material-icons">info</i></td></tr>'
    
                $("#tableProdutos tbody").append(tableRow)
            })    
        }                        
    })            
}

function loadTableFuncionarios() {
    loadDataFromAPI('funcionario', function(funcionarios) {
        if(funcionarios == null) {                            
            $("#tableFuncionarios tbody").append("<tr><td colspan=\"2\">Não há funcionários cadastrados.</td></tr>")
        }         
        else {
            funcionarios.forEach(function(funcionario) {                
                var tableRow = '<tr><td>'+ funcionario.nome +'</td>'
                tableRow    += '<td>'+ funcionario.login +'</td>'                
                tableRow    += '<td><i class="material-icons">info</i></td></tr>'
    
                $("#tableProdutos tbody").append(tableRow)
            })    
        }                        
    })            
}

function sendPost(endpoint, data) {
    var resourceUrl = "http://localhost:8000/" + endpoint
    $.post(resourceUrl, data, function(data){
        console.log(data);        
    })
}