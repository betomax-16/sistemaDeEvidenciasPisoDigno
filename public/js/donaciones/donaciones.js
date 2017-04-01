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

    if (current.attr('id') == 'SPEI') {
      $('.donante').addClass('hidden');
    }
    else {
      $('.donante').removeClass('hidden');
    }
  });

  function limpiarErroresDatosPersonales() {
    $('#nombre').parent().removeClass('has-danger');
    $('#errornombre').html('');
    $('#apellidoPaterno').parent().removeClass('has-danger');
    $('#errorapellidoPaterno').html('');
    $('#apellidoMaterno').parent().removeClass('has-danger');
    $('#errorapellidoMaterno').html('');
    $('#email').parent().removeClass('has-danger');
    $('#erroremail').html('');
  };

  function vaidarDatos(data) {
    for (var property in data) {
      if (property != 'errorPaypal') {
        var formGroup = $('#'+property).parent();
        if (!formGroup.hasClass('has-danger')) {
          formGroup.addClass('has-danger');
        }
        $('#error'+property).html(data[property]);
      }
    }
  };

  $('#btnPaypal').click(function (event) {
    event.preventDefault();
    var url = $(this).attr('url');
    var datos = {
      nombre: $('#nombre').val(),
      apellidoPaterno: $('#apellidoPaterno').val(),
      apellidoMaterno: $('#apellidoMaterno').val(),
      email: $('#email').val(),
      donativo: $('#donativo').val()
    };
    $.get( url, datos )
      .done(function( data ) {
        limpiarErroresDatosPersonales();
        vaidarDatos(data);
        if (data.url != undefined) {
          window.location.href = data.url;
        }
        if (data.errorPaypal != undefined) {
          bootbox.alert(data.errorPaypal);
        }
    });
  });

   $('#RFC-button').click(function () {
     event.preventDefault();
     var url = $(this).attr('url');
     var datos = {
       nombre: $('#nombre').val(),
       apellidoPaterno: $('#apellidoPaterno').val(),
       apellidoMaterno: $('#apellidoMaterno').val(),
       email: $('#email').val(),
       rfc: $('#rfc').val().toUpperCase(),
       cp: $('#cp').val(),
       monto: $('#monto').val(),
       colonia:$('#colonia').val(),
       calle: $('#calle').val(),
       _token : token
     };
     $.post( url, datos)
      .done(function( data ) {
        limpiarErroresDatosPersonales();
        $('#rfc').parent().removeClass('has-danger');
        $('#errorrfc').html('');
        $('#colonia').parent().removeClass('has-danger');
        $('#errorcolonia').html('');
        $('#calle').parent().removeClass('has-danger');
        $('#errorcalle').html('');
        $('#cp').parent().removeClass('has-danger');
        $('#errorcp').html('');
        $('#monto').parent().removeClass('has-danger');
        $('#errormonto').html('');
        vaidarDatos(data);
        if (data.status != undefined) {
            window.location.href = data.url;
        }
      });
   });

   $('#SPEI-button').click(function () {
     //alert(obtenerDatosSPEI().cp);
     bootbox.alert('proximámente SPEI');
   });
});
