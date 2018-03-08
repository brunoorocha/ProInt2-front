$(function() {

    var offCanvasOn = false
    
    offCanvasNavActivate()    

    $('[data-toggle="tooltip"]').tooltip()

    $('.mask').hide()
    $('.modal').hide()
    $('.modal-mask').hide()

    $('.toggle-nav-left').on('click', function() {
        $('.nav-left').addClass('nav-left-active')
        $('.mask').show().addClass('mask-active')
        offCanvasOn = true
    });

    $('.mask').on('click', function() {
        $('.nav-left').removeClass('nav-left-active')
        $('.mask').hide()
        offCanvasOn = false
    })

    var page = $('body').attr('page-title');
    $("."+ page).addClass('nav-link-active');

    $('.nav-link-active').on('click', function(e) {
        e.preventDefault();
    });

    $(window).resize(function() {
        offCanvasNavActivate()
    })

    $('.modal-mask').addClass('modal-mask-active').on('click', function() {
        $('.modal').hide()
        $('.modal-mask').removeClass('modal-mask-active')
        $('.modal-mask').hide()
    })

    function offCanvasNavActivate() {
        if(window.innerWidth >= 960) {
            $('.nav-left').addClass('nav-left-active')
            $('.nav-bottom').addClass('nav-bottom-unactive')
            $('.nav-left').removeClass('position-fixed')
            $('.toggle-nav-left').parent().hide()

            offCanvasOn = false;
            $('.mask').hide()
        } else {
            if(offCanvasOn) {
                $('.mask').show().addClass('mask-active')
            } else {
                $('.nav-left').removeClass('nav-left-active')
            }

            $('.toggle-nav-left').parent().show()
            $('.nav-left').addClass('position-fixed')
            $('.nav-bottom').removeClass('nav-bottom-unactive')
        }
    }    
    
    $('#add-product-form').on('submit', function(e){
        e.preventDefault()                
        var formSerialized = JSON.stringify(serializeForm($(this)))
        
        sendPost('produto', formSerialized)
        $("#adicionarProdutoModal").modal('hide')
        loadTableProdutos()
    })

    $('#add-cliente-form').on('submit', function(e){
        e.preventDefault()                
        var formSerialized = JSON.stringify(serializeForm($(this)))        
        
        sendPost('cliente', formSerialized)      
        $("#adicionarClienteModal").modal('hide')
        loadTableClientes()  
    })


    $('#add-funcionario-form').on('submit', function(e){
        e.preventDefault()                
        var formSerialized = JSON.stringify(serializeForm($(this)))        
        
        sendPost('funcionario', formSerialized)      
        $("#adicionarFuncionarioModal").modal('hide')
        loadTableFuncionarios()  
    })

    $('#removeCliente').on('click', function(e) {
        e.preventDefault()
        
        var id = $('#infoClienteModal #cod_cliente').val()
        removeOnEndPointById('cliente/', id, function(response) {                        
            $('#infoClienteModal').modal('hide')        
            loadTableClientes()
        })
    })

    $('#removeProduto').on('click', function(e) {
        e.preventDefault()

        var id = $('#infoProdutoModal #cod_produto').val()
        removeOnEndPointById('produto/', id, function(response) {            
            $('#infoProdutoModal').modal('hide')        
            loadTableProdutos()
        })
    })

    $('.secondary').hide()

    $('#infoProdutoModal #edit-button').on('click', function(){
        $('.primary').hide()
        $('.secondary').show()

        $('#infoProdutoModal #cod_produto').removeAttr('disabled').focus()
        $('#infoProdutoModal #nome').removeAttr('disabled')
        $('#infoProdutoModal #preco_fabrica').removeAttr('disabled')
        $('#infoProdutoModal #preco_revenda').removeAttr('disabled')
        $('#infoProdutoModal #fornecedor').removeAttr('disabled')
    })

    $('#infoProdutoModal #cancel-edit-button').on('click', function(){
        $('.primary').show()
        $('.secondary').hide()

        $('#infoProdutoModal #cod_produto').attr('disabled', 'disabled')
        $('#infoProdutoModal #nome').attr('disabled', 'disabled')
        $('#infoProdutoModal #preco_fabrica').attr('disabled', 'disabled')
        $('#infoProdutoModal #preco_revenda').attr('disabled', 'disabled')
        $('#infoProdutoModal #fornecedor').attr('disabled', 'disabled')
    })

    $('#infoClienteModal #edit-button').on('click', function(){
        $('.primary').hide()
        $('.secondary').show()
                
        $('#infoClienteModal #nome').removeAttr('disabled').focus()
        $('#infoClienteModal #cpf').removeAttr('disabled')
        $('#infoClienteModal #rg').removeAttr('disabled')
        $('#infoClienteModal #naturalidade').removeAttr('disabled')
        $('#infoClienteModal #filiacao').removeAttr('disabled')
        $('#infoClienteModal #profissao').removeAttr('disabled')
        $('#infoClienteModal #endereco').removeAttr('disabled')
        $('#infoClienteModal #nome_conjuge').removeAttr('disabled')
        $('#infoClienteModal #profissao_conjuge').removeAttr('disabled')
        $('#infoClienteModal #referencia').removeAttr('disabled')
        $('#infoClienteModal #telefone_referencia').removeAttr('disabled')
        
    })

    $('#infoClienteModal #cancel-edit-button').on('click', function(){
        $('.primary').show()
        $('.secondary').hide()

        $('#infoClienteModal #nome').attr('disabled', 'disabled')
        $('#infoClienteModal #cpf').attr('disabled', 'disabled')
        $('#infoClienteModal #rg').attr('disabled', 'disabled')
        $('#infoClienteModal #naturalidade').attr('disabled', 'disabled')
        $('#infoClienteModal #filiacao').attr('disabled', 'disabled')
        $('#infoClienteModal #profissao').attr('disabled', 'disabled')
        $('#infoClienteModal #endereco').attr('disabled', 'disabled')
        $('#infoClienteModal #nome_conjuge').attr('disabled', 'disabled')
        $('#infoClienteModal #profissao_conjuge').attr('disabled', 'disabled')
        $('#infoClienteModal #referencia').attr('disabled', 'disabled')
        $('#infoClienteModal #telefone_referencia').attr('disabled', 'disabled') 
    })

    $('#edit-product-form').on('submit', function(e) {        
        e.preventDefault()                

        var formSerialized = JSON.stringify(serializeForm($(this)))        
        var id = $('#infoProdutoModal #cod_produto').val()

        updateOnEndPoint('produto', formSerialized, id, function(res) {
            $('.primary').show()
            $('.secondary').hide()
            
            $("#infoProdutoModal").modal('hide')
            loadTableProdutos() 
        })        
    })

    $('#edit-cliente-form').on('submit', function(e) {        
        e.preventDefault()                

        var formSerialized = JSON.stringify(serializeForm($(this)))        
        var id = $('#infoClienteModal #cod_cliente').val()

        updateOnEndPoint('cliente', formSerialized, id, function(res) {
            $('.primary').show()
            $('.secondary').hide()
            
            $("#infoClienteModal").modal('hide')
            loadTableClientes() 
        })        
    })
})

function loadClienteInfoModal(id) {                     
    $('#infoClienteModal').modal('show')
   
    getOnEndPointById('cliente', id, function(cliente) {        
        $('#infoClienteModal #cod_cliente').val(cliente.cod_cliente)
        $('#infoClienteModal #nome').val(cliente.nome).attr('disabled', 'disabled')
        $('#infoClienteModal #cpf').val(cliente.cpf).attr('disabled', 'disabled')
        $('#infoClienteModal #rg').val(cliente.rg).attr('disabled', 'disabled')
        $('#infoClienteModal #naturalidade').val(cliente.naturalidade).attr('disabled', 'disabled')
        $('#infoClienteModal #filiacao').val(cliente.filiacao).attr('disabled', 'disabled')
        $('#infoClienteModal #profissao').val(cliente.profissao).attr('disabled', 'disabled')
        $('#infoClienteModal #endereco').val(cliente.endereco).attr('disabled', 'disabled')
        $('#infoClienteModal #nome_conjuge').val(cliente.nome_conjuge).attr('disabled', 'disabled')
        $('#infoClienteModal #profissao_conjuge').val(cliente.profissao_conjuge).attr('disabled', 'disabled')
        $('#infoClienteModal #referencia').val(cliente.referencia).attr('disabled', 'disabled')
        $('#infoClienteModal #telefone_referencia').val(cliente.telefone_referencia).attr('disabled', 'disabled') 
    })
}    

function loadProdutoInfoModal(id) {                     
    $('#infoProdutoModal').modal('show')
   
    getOnEndPointById('produto', id, function(produto){
        $('#infoProdutoModal #cod_produto').val(produto.cod_produto).attr('disabled', 'disabled')
        $('#infoProdutoModal #nome').val(produto.nome).attr('disabled', 'disabled')
        $('#infoProdutoModal #preco_fabrica').val(produto.preco_fabrica).attr('disabled', 'disabled')
        $('#infoProdutoModal #preco_revenda').val(produto.preco_revenda).attr('disabled', 'disabled')
        $('#infoProdutoModal #fornecedor').val(produto.fornecedor).attr('disabled', 'disabled')
    })
}    


function serializeForm(form) {
    var dataSerialized = {}
    var formData = form.serializeArray()

    formData.forEach(function(element) {
        dataSerialized[element.name] = element.value
    })

    return dataSerialized;
}
