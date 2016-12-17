$(document).ready(function () {
  function mostrarImagen(input, selector) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
     $(selector).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
   }
  }

  $("input[type=file]").change(function(){
    var extenciones = ['.jpeg', '.jpg', '.png'];
    var selector = $(this).attr('id').replace('foto','img');

    if (selector != 'imgN') {
      var extencion = $(this).val().substring($(this).val().lastIndexOf('.')).toLowerCase();
      if (extenciones.indexOf(extencion) >= 0) {
        mostrarImagen(this, '#'+selector);
      }
      else {
        $('#'+selector).attr('src', imageDefault);
      }
    }
    else {
      $('#otros').html('');
      if (this.files.length > 0) {
        for (var i = 0; i < this.files.length; i++) {
          var extencion = this.files[i].name.substring(this.files[i].name.lastIndexOf('.')).toLowerCase();
          if (extenciones.indexOf(extencion) >= 0) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#otros').append('<div class="col-md-4"><center><img class="img-thumbnail img-responsive box" src="'+e.target.result+'"></center></div>');
            }
            reader.readAsDataURL(this.files[i]);
          }
          else {
            $('#otros').append('<div class="col-md-4"><center><img class="img-thumbnail img-responsive box" src="'+imageDefault+'"></center></div>');
          }
        }
      }
      else {
        $('#otros').append('<div class="col-md-4"><center><img class="img-thumbnail img-responsive box" src="'+imageDefault+'"></center></div>');
      }
    }
  });

  $('img').click(function () {
    var input = $(this).attr('id').replace('img','foto');
    if (input != 'fotoN') {
        $('#'+input).trigger('click');
    }
  });

  $( "#acordion" ).accordion();

  $('#localidad').change(function () {
    $('#idLocalidad').val('');
  });

  $('#municipio').change(function () {
    $('#idMunicipio').val('');
    $( "#localidad" ).prop( "disabled", true );
    $('#localidad').val('');
  });

  $('#municipio').keyup(function(e){
      var lugar = $(this).val();
      var region = 'MUNICIPIO';
      if (lugar.length > 1) {
        var data = {place : lugar, area : region, _token : token};
        var url = '../../evidencias/autocomplete';

        $.post(url, data, function(response) {
          $( "#municipio" ).autocomplete({
            source: response.lugares,
            minLength: 2,
            select: function(event, ui) {
              event.preventDefault();
              $( "#municipio" ).val(ui.item.label);
              $( "#idMunicipio" ).val(ui.item.label+'_'+ui.item.value);
              $( "#localidad" ).prop( "disabled", false );
            },
            focus: function(event, ui) {
              event.preventDefault();
            }
          });
        });
      }
  });

  $('#localidad').keyup(function(){
      var localidad = $(this).val();
      var mun = $( "#idMunicipio" ).val();
      if (localidad.length > 1) {
        var data = {lugar : localidad, municipio : mun, _token : token};
        var url = '../../evidencias/autocompleteLocalidad';

        $.post(url, data, function(response) {
          $( "#localidad" ).autocomplete({
            source: response.lugares,
            minLength: 2,
            select: function(event, ui) {
              event.preventDefault();
              $( "#localidad" ).val(ui.item.label);
              $( "#idLocalidad" ).val(ui.item.value);
            },
            focus: function(event, ui) {
              event.preventDefault();
            }
          });
        });
      }
  });

  if ($('#idMunicipio').val() != '') {
    $('#localidad').prop('disabled', false);
  }

  /*$('#btnGuardar').click(function (e) {
    e.preventDefault();

    alert($('#fotos').val().length);
  });*/
});
