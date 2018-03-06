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
})

function serializeForm(form) {
    var dataSerialized = {}
    var formData = form.serializeArray()

    formData.forEach(function(element) {
        dataSerialized[element.name] = element.value
    })

    return dataSerialized;
}
