
var currentLocation = window.location.host
var apiURL = "http://" + currentLocation +"/"

function loadDataFromAPI(endpoint, callback) {
    var resourceUrl =  apiURL + endpoint
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
    $("#tableProdutos tbody").html('');
    
    loadDataFromAPI('produto', function(produtos) {
        if(produtos == null) {                            
            $("#tableProdutos tbody").append("<tr><td colspan=\"3\">Não há produtos para exibir.</td></tr>")
            $('#table-itens-count').html("0")
        }         
        else {
            var counter = 0;
            produtos.forEach(function(produto) {                
                var tableRow = '<tr><td>'+ produto.cod_produto +'</td>'
                tableRow    += '<td>'+ produto.nome +'</td>'
                tableRow    += '<td class="sm-cell-hide">'+ produto.preco_revenda +'</td>'
                tableRow    += '<td class="md-cell-hide">'+ produto.fornecedor +'</td>'
                tableRow    += '<td><i class="material-icons">info</i></td></tr>'
    
                $("#tableProdutos tbody").append(tableRow)
                counter++
            })                
            
            $('#table-itens-count').html(counter)
        }                  
    })            
}

function loadTableFuncionarios() {
    $("#tableFuncionarios tbody").html('');

    loadDataFromAPI('funcionario', function(funcionarios) {
        if(funcionarios == null) {                            
            $("#tableFuncionarios tbody").append("<tr><td colspan=\"2\">Não há funcionários cadastrados.</td></tr>")
            $('#table-itens-count').html("0")
        }         
        else {
            var counter = 0;
            funcionarios.forEach(function(funcionario) {                
                var tableRow = '<tr><td>'+ funcionario.nome +'</td>'
                tableRow    += '<td>'+ funcionario.login +'</td>'                
                tableRow    += '<td><i class="material-icons">info</i></td></tr>'
    
                $("#tableFuncionarios tbody").append(tableRow)
                counter++
            })   
            
            $('#table-itens-count').html(counter)
        }                        
    })            
}

function loadTableClientes() {
    $("#tableClientes tbody").html('');

    loadDataFromAPI('cliente', function(clientes) {
        if(clientes == null) {                            
            $("#tableClientes tbody").append("<tr><td colspan=\"2\">Não há clientes cadastrados.</td></tr>")
            $('#table-itens-count').html("0")
        }         
        else {
            var counter = 0;
            clientes.forEach(function(cliente) {                
                var tableRow = '<tr><td>'+ cliente.nome +'</td>'
                tableRow    += '<td class="align-center"><i class="material-icons" style="color: var(--green);">label</i></td>'                
                tableRow    += '<td class="sm-cell-hide">'+ cliente.profissao +'</td>'                
                tableRow    += '<td class="md-cell-hide">'+ cliente.profissao +'</td>'                
                tableRow    += '<td><a href="javascript:loadClienteInfoModal('+ cliente.cod_cliente +')"><i class="material-icons">info</i></a></td></tr>'
    
                $("#tableClientes tbody").append(tableRow)

                counter++
            })   
            
            $('#table-itens-count').html(counter)
        }                        
    })            
}

function getClienteById(id, callback) {
    loadDataFromAPI('cliente/'+ id, callback)
}

function removeClienteById(id, callback) {
    var resourceUrl = apiURL + 'cliente/' + id

    $.ajax({
        url: resourceUrl,
        type: 'DELETE', 
        success: function(response) {
            callback(response)
        }
    })
}

function sendPost(endpoint, data) {
    var resourceUrl = apiURL + endpoint
    $.post(resourceUrl, data, function(data){
        console.log(data);        
    })
}