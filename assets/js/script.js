$(document).ready(function(){
    //function header background
    var header = $('.bg-img');

    var backgrounds = new Array(
        'url(assets/img/background/back1.jpg)'
        , 'url(assets/img/background/back2.jpg)'
        , 'url(assets/img/background/back3.jpg)'
        , 'url(assets/img/background/back4.jpg)'
    );

    var current = 0;

    function nextBackground() {
        current++;
        current = current % backgrounds.length;
        header.css('background-image', backgrounds[current]);
    }
    setInterval(nextBackground, 10000);

    header.css('background-image', backgrounds[0]);
//
// function menu tarifs
    $('.pricing').on('click', function(){
        idStatut = $(this).attr('data-statut');

        $('.pricing').removeClass('selected');
        $(this).addClass('selected');
        $('.price-title .bouton').removeClass('selected');
        $(this).addClass('selected');

        $('.price-content').css('display', 'none');
        $('.statut-' + idStatut).css('display', 'block');

        $('.parent-pricing-enfant').each(function (keyF) {
            tarifs = $(this).find('.price-content');

            hasTarif = 0;
            tarifs.each(function (keyT) {
                if($(this).css('display') !== 'none'){
                    hasTarif++;
                }
            });
            if(hasTarif > 0){
                $(this).css('display', 'block');
            } else {
                $(this).css('display', 'none');
            }
        });
    });
//

});
