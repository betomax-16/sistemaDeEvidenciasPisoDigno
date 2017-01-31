$(document).ready(function () {
  $('#donar').addClass('active');

  $('.menu-recurso li').click(function (event) {
    event.preventDefault();
    var current = $(this);
    var forms = $('#forms-donaciones > div');
    for (var i = 0; i < forms.length; i++) {
      if (!$(forms[i]).hasClass('hidden')) {
        $(forms[i]).addClass('hidden');
      }
    }
    var opciones = $('.menu-recurso li');
    for (var i = 0; i < opciones.length; i++) {
      $(opciones[i]).removeClass('recurso-active');
      if (current.attr('id') == $(opciones[i]).attr('id') && !current.hasClass('recurso-active')) {
        current.addClass('recurso-active');
        $('#'+current.attr('id')+'-form').removeClass('hidden');
      }
    }
  });

  function obtenerDatosPersonales() {
    return {
      nombre:$('#nombre').val(),
      apellidoPaterno:$('#apellidoPaterno').val(),
      apellidoMaterno:$('#apellidoMaterno').val(),
      email:$('#email'),
      _token:token
    };
  }

  function obtenerDatosRFC() {
    return {
      rfc:$('#rfc').val(),
      estado:$('#RFC-form #estado').val(),
      cp:$('#RFC-form #cp').val(),
      _token:token
    };
  }

  function obtenerDatosSPEI() {
    return {
      estado:$('#SPEI-form #estado').val(),
      cp:$('#SPEI-form #cp').val(),
      _token:token
    };
  }

   $('#RFC-button').click(function () {
     //alert(obtenerDatosPersonales().nombre);
     //alert(obtenerDatosRFC().cp);
     bootbox.alert('proximámente RFC');
   });

   $('#SPEI-button').click(function () {
     //alert(obtenerDatosSPEI().cp);
     bootbox.alert('proximámente SPEI');
   });
});
