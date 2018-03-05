$(function() {

    var offCanvasOn = false

    loadDataFromAPI()
    offCanvasNavActivate()

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

    $(window).resize(function() {
        offCanvasNavActivate()
    })

    $('#add-product-button').on('click', function(evt){
        evt.preventDefault()
        $('.modal-mask').show()
        $('.modal-mask').addClass('modal-mask-active')
        $('.modal').show()
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

    var apiUrl = "http://localhost:8000";

    function loadDataFromAPI() {
        $.get("http://localhost:8000/produto/", function(produtos, status){                             
            if(status == "nocontent") {                            
                $("#tableProdutos tbody").append("<tr><td>Não há produtos para exibir.</td></tr>")
            }         
            else if(status == "success") {
                produtos.forEach(function(produto) {                
                    var tableRow = '<tr><td>'+ produto.cod_produto +'</td>'
                    tableRow    += '<td>'+ produto.nome +'</td>'
                    tableRow    += '<td class="sm-cell-hide">'+ produto.preco_fabrica +'</td>'
                    tableRow    += '<td class="md-cell-hide">'+ produto.fornecedor +'</td>'
                    tableRow    += '<td><i class="material-icons">info</i></td></tr>'
    
                    $("#tableProdutos tbody").append(tableRow)
                })    
            }                        
        }, "json")
    }
})
