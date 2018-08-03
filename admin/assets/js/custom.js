$(document).ready(function(){

  $(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");

    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });
// function updates
    $('.updateBtnH').on('click', function () {
        id_h = $(this).attr('data-id');
        $('#updateH').val(id_h);
    });
    $('.updateadp').on('click', function () {
        id_u = $(this).attr('data-id');
        $('#updateadp').val(id_u);
    });
    $('.updateBtnPart').on('click', function () {
        id_part = $(this).attr('data-id');
        $('#updatePart').val(id_part);
    });
    $('.updateBtnFormule').on('click', function () {
        id_f = $(this).attr('data-id');
        $('#updateF').val(id_f);
    });
    $('.updateBtnStatut').on('click', function () {
        id_s = $(this).attr('data-id');
        $('#updateS').val(id_s);
    });
       $('.updateBtnTarif').on('click', function () {
        id_ta = $(this).attr('data-id');
        $('#updateT').val(id_ta);
    }); 
});