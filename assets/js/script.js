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


    $('.statut-menu').on('click', function(){
        idStatut = $(this).attr('data-statut');
        $('.statut-menu').removeClass('selected');
        $(this).addClass('selected');
        $('.pricing-enfant').show();
        $('.price-content').css('display', 'none');
        $('.statut-' + idStatut).css('display', 'block');
        console.log(idStatut);

    });
});
