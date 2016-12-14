$(document).ready(function(){
    function templateFamilias(id,familia, url1, url2, url3) {
        var aux = template;
        aux = aux.replace(/%ID%/g,id);
        aux = aux.replace('%FAMILIA%',familia);
        aux = aux.replace('%URL1%',url1);
        aux = aux.replace('%URL2%',url2);
        aux = aux.replace('%URL3%',url3);
        return aux;
    };

    function evidencias(año, region, lugar){
      //var proyecto = $('#proyecto').html();
      var data = {place : lugar, area : region, year : año, project : proyecto, _token : token};
      var url = '../hogares';
      $('#evidencias').html('');
      $.post(url, data, function(response) {
        if (response.beneficiados.length > 0) {
          for (var i = 0; i < response.beneficiados.length; i++) {
            var id = response.beneficiados[i].idHogar;
            var familia = response.beneficiados[i].familia;
            switch (response.beneficiados[i].fotos.length) {
              case 1:
                  $('#evidencias').append(templateFamilias(id,familia,'/foto.png', '/foto.png', '/'+response.beneficiados[i].fotos[0].nombreArchivo));
                break;
              case 2:
                  $('#evidencias').append(templateFamilias(id,familia, '/'+response.beneficiados[i].fotos[0].nombreArchivo, '/'+response.beneficiados[i].fotos[1].nombreArchivo,'/foto.png'));
                break;
              case 3:
                  $('#evidencias').append(templateFamilias(id,familia, '/'+response.beneficiados[i].fotos[0].nombreArchivo, '/'+response.beneficiados[i].fotos[1].nombreArchivo, '/'+response.beneficiados[i].fotos[2].nombreArchivo));
                break;
              default:
                  if (response.beneficiados[i].fotos.length > 3) {
                    $('#evidencias').append(templateFamilias(id,familia, '/'+response.beneficiados[i].fotos[0].nombreArchivo, '/'+response.beneficiados[i].fotos[1].nombreArchivo, '/'+response.beneficiados[i].fotos[2].nombreArchivo));
                  }
                  else {
                    $('#evidencias').append(templateFamilias(id,familia,'/foto.png', '/foto.png', '/foto.png'));
                  }
                break;
            }
          }
        }
        else {
          $('#evidencias').append('<div class="col-md-12"><h1>No se encontraron resultados...</h1></div>');
        }
      });
    };

    $('#btnBuscar').click(function () {
      var año = $('#año').val();
      var region = $('#region').val();
      var lugar = $('#nombreLugar').val();
      evidencias(año, region, lugar);
    });

    $('#nombreLugar').keyup(function(){
        var lugar = $(this).val();
        var region = $('#region').val();
        if (lugar.length > 1) {
          var data = {place : lugar, area : region, _token : token};
          var url = '../autocomplete';

          $.post(url, data, function(response) {
            $( "#nombreLugar" ).autocomplete({
              source: response.lugares,
              minLength: 2,
              select: function(event, ui) {
                event.preventDefault();
                $( "#nombreLugar" ).val(ui.item.label);
                //$('#id_municipio').val(ui.item.value);
              },
              focus: function(event, ui) {
                event.preventDefault();
              }
            });
          });
        }
    });

    function municipioConMasBeneficiados() {
      var region = $('#region').val();
      var anio = new Date().getFullYear();
      var url = '../masBeneficiados';
      var data = {state : estado, project : proyecto, _token : token};
      $('#año').val(anio);
      $.post(url, data, function(response) {
        evidencias(anio, region, response.municipio.nombre);
        $('#nombreLugar').val(response.municipio.nombre);
      });
    }

    municipioConMasBeneficiados();

});
