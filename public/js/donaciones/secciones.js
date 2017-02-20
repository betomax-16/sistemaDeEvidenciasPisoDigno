$(document).ready(function () {
  $('.buttons a').click(function (event) {
    event.preventDefault();
    var owner = $(this).parent().parent().parent();
    var idOwner = owner.attr('id');
    var item = $(this).attr('targetItem');


    $('#'+idOwner+' .slider li').each(function() {
        $( this ).fadeOut("slow");
    });

    $('#'+idOwner+' .slider li').promise().done(function () {
      $('#'+idOwner+' .slider .'+item).fadeIn("slow");
    });

    $('#'+idOwner+' .slider .buttons a').each(function() {
      $( this ).removeClass( "active" );
    });
    $(this).addClass('active');
  });

  $('#btnTranslados').click(function (event) {
    event.preventDefault();
    bootbox.alert('En caso de que te sea complicado el traslado de tus donativos, háznoslo saber por cualquiera de nuestros medios de contacto, a efecto de COORDINAR LA RECOLECCIÓN de los mismos.');
  });
});
