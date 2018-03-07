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
        removeClienteById(id, function(response) {
            $('#infoClienteModal').modal('hide')        
            loadTableClientes()
        })
    })
})

function loadClienteInfoModal(id) {                     
    $('#infoClienteModal').modal('show')
   
    getClienteById(id, function(cliente) {
        $('#infoClienteModal #cod_cliente').val(cliente.cod_cliente)
        $('#infoClienteModal #nome').val(cliente.nome)
        $('#infoClienteModal #cpf').val(cliente.cpf)
        $('#infoClienteModal #rg').val(cliente.rg)
        $('#infoClienteModal #naturalidade').val(cliente.naturalidade)
        $('#infoClienteModal #filiacao').val(cliente.filiacao)
        $('#infoClienteModal #profissao').val(cliente.profissao)  
        $('#infoClienteModal #endereco').val(cliente.endereco)
        $('#infoClienteModal #nome_conjuge').val(cliente.nome_conjuge)
        $('#infoClienteModal #profissao_conjuge').val(cliente.profissao_conjuge)
        $('#infoClienteModal #referencia').val(cliente.referencia)
        $('#infoClienteModal #telefone_referencia').val(cliente.telefone_referencia)            
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
