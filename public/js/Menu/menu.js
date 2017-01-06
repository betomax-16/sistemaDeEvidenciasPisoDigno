$(document).ready(function () {
  var contador = 1;
  $('.nav-bar').click(function () {
    if (contador == 1) {
      $('nav').animate({left:'0'});
      contador = 0;
    }
    else {
      $('nav').animate({left:'-100%'});
      contador = 1;
    }
  });

  $('.sub-menu').click(function () {
    $(this).children('.children').slideToggle();
  });

  $('.container').click(function () {
    $('.nav-bar').trigger('click');
  });
});
