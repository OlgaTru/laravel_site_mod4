$(document).ready(function() {
    $('.ad-popover').popover({
        trigger: "hover focus",
        animation: true,
        delay: {show: 500}
    });

    $('.card')
        .mouseover(function () {
            $(this).find('h5.card-title.price').addClass('price-scale')

        })
        .mouseout(function () {
            /*$(this).css({"background-color": 'rgba(0,0,0,0)'});*/
            $(this).find('h5.card-title.price').removeClass('price-scale')
        })
})

