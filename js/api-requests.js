
var currentLocation = window.location.host
var apiURL = "./api/"
var token = localStorage.getItem("otica_token")

if((token == null || token == "") && window.location.pathname != "/Login.php") {
    window.location = "/Login.php"
}

var userLoggedName = getInfoInToken("name", token)


function loadDataFromAPI(endpoint, callback) {
    var resourceUrl =  apiURL + "?resource="+ endpoint
    
    $.ajax({
        url: resourceUrl,
        type: 'GET',
        crossDomain: true,
        dataType: "json",
        headers: {
            'token': token
        },
        statusCode: {
            401: function() {
                window.location = "/Login.php"
            }
        },
        success:  function(resources, status){                                     
            if(status == "nocontent") {                            
                callback(null);        
            }    
            
            if(status == "success"){
                callback(resources);        
            }
        } 
    })
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
                tableRow    += '<td><a href="javascript:loadProdutoInfoModal('+ produto.cod_produto +')"><i class="material-icons">info</i></a></td></tr>'
    
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
                tableRow    += '<td class="md-cell-hide"><a class="table-link" href="Refratometria.php?cliente='+ cliente.cod_cliente +'">visualizar</a></td>'                
                tableRow    += '<td><a href="javascript:loadClienteInfoModal('+ cliente.cod_cliente +')"><i class="material-icons">info</i></a></td></tr>'
    
                $("#tableClientes tbody").append(tableRow)

                counter++
            })   
            
            $('#table-itens-count').html(counter)
        }                        
    })            
}

function loadTableRefratometria() {
    var url = new URL(window.location)
    var codCliente = url.searchParams.get("cliente")

    $("#tableRefratometria tbody").html('') 
    $('#listaRefratometrias').html('')

    $('#cod_cliente').val(codCliente)
    getOnEndPointById("refratometria", codCliente, function(refratometrias){
        if(refratometrias == null) {
            $("#tableRefratometria tbody").append("<tr><td colspan=\"2\">Não há refratometria cadastrada.</td></tr>");
        }
        else {      
            for(key in refratometrias) {
                
                data = new Date(refratometrias[key].data)
                data = dateFormatter(data)
                
                if(key == 0) {
                    var tableRow = "<tr><td><b>OD</b></td>"
                    tableRow += "<td>"+ refratometrias[key].odesf +"</td>"
                    tableRow += "<td>"+ refratometrias[key].odcil +"</td>"
                    tableRow += "<td>"+ refratometrias[key].odeixo +"</td>"
                    tableRow += "<td>"+ refratometrias[key].oddmp +"</td>"
                    tableRow += "</tr>"
        
                    tableRow += "<tr><td><b>OE</b></td>"
                    tableRow += "<td>"+ refratometrias[key].oeesf +"</td>"
                    tableRow += "<td>"+ refratometrias[key].oecil +"</td>"
                    tableRow += "<td>"+ refratometrias[key].oeeixo +"</td>"
                    tableRow += "<td>"+ refratometrias[key].oedmp +"</td>"
                    tableRow += "</tr>"
        
                    $("#tableRefratometria tbody").append(tableRow)                                              
                    $('#data-refratometria').html(data)        
                }

                var itemLista = '<a href="#" class="list-group-item list-group-item-action text-primary">'+ data +'</a>'                
                $('#listaRefratometrias').append(itemLista)
    
            }            
        }
    })  
    
    getOnEndPointById('cliente', codCliente, function(cliente) {
        $('#nome-cliente').html(cliente.nome)
    })
}

function loadTableCaixa() {
    
    $('#tableVendas tbody').html('')

    loadDataFromAPI("venda", function(vendas) {
        vendas.forEach(function(venda) {                        

            data = new Date(venda.data)
            data = dateFormatter(data)

            var tableRow = '<tr><td>'+ data +'</td>'
            tableRow += '<td>'+ venda.cliente +'</td>'
            tableRow += '<td class="sm-cell-hide">'+ venda.forma_pagamento +'</td>'
            tableRow += '<td class="md-cell-hide">'+ venda.funcionario +'</td></tr>'

            $('#tableVendas tbody').append(tableRow)
        })        
    })
}

function getOnEndPointById(endpoint, id, callback) {
    loadDataFromAPI((endpoint +"&key="+ id), callback)
}

function getOnEndPointBySearch(endpoint, search, callback) {
    loadDataFromAPI((endpoint +"&key=search&value="+ search), callback)
}

function removeOnEndPointById(endpoint, id, callback) {
    var resourceUrl = apiURL + "?resource=" + endpoint +"&key="+ id

    $.ajax({
        url: resourceUrl,
        type: 'DELETE', 
        headers: {
            'token': token
        },
        success: function(response) {
            callback(response)
        }
    })
}

function updateOnEndPoint(endpoint, object, id, callback) {
    var resourceUrl = apiURL + "?resource=" + endpoint +"&key="+ id
    
    $.ajax({
        url: resourceUrl,
        type: 'PUT', 
        data: object,
        headers: {
            'token': token
        },
        success: function(response) {
            callback(response)
        }
    })
}

function sendPost(endpoint, data) {
    var resourceUrl = apiURL + "?resource=" + endpoint
    $.ajax({
        url: resourceUrl,
        type: 'POST',
        data: data,
        headers: {
            'token': token
        },
        success: function(response){
                 
        }
    })    
}