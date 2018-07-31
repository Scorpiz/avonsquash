$(document).ready(function(){
    var header = $('.bg-img');

    var backgrounds = new Array(
        'url(assets/img/background/cat1.jpg)'
        , 'url(assets/img/background/cat2.jpg)'
        , 'url(assets/img/background/cat3.jpg)'
    );

    var current = 0;

    function nextBackground() {
        current++;
        current = current % backgrounds.length;
        header.css('background-image', backgrounds[current]);
    }
    setInterval(nextBackground, 10000);

    header.css('background-image', backgrounds[0]);


    $('.pricing').on('click', function(){
        idStatut = $(this).attr('data-statut');

        $('.pricing').removeClass('selected');
        $(this).addClass('selected');

        $('.price-content').css('display', 'none');
        $('.statut-' + idStatut).css('display', 'block');

        $('.pricing-enfant').each(function (keyF) {
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


});
